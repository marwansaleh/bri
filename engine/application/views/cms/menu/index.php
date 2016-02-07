<input type="hidden" id="page" value="<?php echo $page; ?>" />
<div class="row">
    <div class="col-sm-12">
        <?php if ($this->session->flashdata('message')): ?>
        <?php echo create_alert_box($this->session->flashdata('message'),$this->session->flashdata('message_type')); ?>
        <?php endif; ?>
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-3">
                        <h3 class="box-title">List of Menu</h3>
                    </div>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group form-group-sm">
                                    <select id="category" class="form-control"style="min-width: 150px;">
                                        <option value="-1">-- All Categories--</option>
                                        <option value="<?php echo CT_MAINMENU_HOME; ?>">HOME</option>
                                        <option value="<?php echo CT_MAINMENU_CORPORATE; ?>">CORPORATE</option>
                                        <option value="<?php echo CT_MAINMENU_TOP; ?>">TOP MENU</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group form-group-sm">
                                    <div class="input-group">
                                        <input type="number" class="form-control" step="1" min="2" id="limit" value="10" title="Data limit" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group form-group-sm">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="search" placeholder="Search title..." />
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-success btn-sm" id="btn-filter"><i class="fa fa-search"></i> Search</button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <a class="btn btn-sm btn-primary" data-toggle="tooltip" title="Create" href="<?php echo get_cms_url('menu/edit'); ?>"><i class="fa fa-plus-square"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-header -->
            
            <div class="box-body table-responsive no-padding">
                <table id="data-list" class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Caption</th>
                            <th>Name</th>
                            <th>Href</th>
                            <th>Category</th>
                            <th>Created</th>
                            <th style="width: 120px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
                <div id="pagination"><!-- filled up by ajax --></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var MenuManager = {
        page: 1,
        totalPage: 1,
        menuType: 'all',
        category: 0,
        searchText: null,
        inProcess: false,
        reachLimit: false,
        dataLimit: 12,
        init: function (){
            this.setPage($('#page').val());
            this.setCategory($('#category').val());
            this.setDataLimit($('#limit').val());
            this.setSearch($('#search').val());
            
            this.load();
        },
        filter: function (){
            this.setPage(1);
            this.setCategory($('#category').val());
            this.setDataLimit($('#limit').val());
            this.setSearch($('#search').val());
            
            this.load();
        },
        setDataLimit: function (limit){
            this.dataLimit = parseInt(limit);
            this.reachLimit = false;
        },
        setCategory: function(category){
            this.category = parseInt(category);
        },
        setSearch: function(strSearch){
            this.searchText = strSearch;
        },
        load: function (){
            var _this = this;
            if (_this.reachLimit || _this.inProccess){
                return;
            }
            _this.inProccess = true;
            
            _this._setLoader('loading');
            //load from service
            $.getJSON(_this._getUrl('service/menu'),{limit:_this.dataLimit,page:_this.page,category:_this.category,search:_this.searchText}, function(data){
                _this.inProccess = false;
                _this._setLoader('reset');
                _this._clearList();
                
                if (data.items.length > 0){
                    for (var i in data.items){
                        var s = '<tr id="'+data.items[i].id+'" data-id="'+data.items[i].id+'">';
                            s+= '<td>'+_this._getRecNumber(i)+'.</td>';
                            s+= '<td>'+data.items[i].caption+'</td>';
                            s+= '<td>'+data.items[i].name+'</td>';
                            s+= '<td>'+data.items[i].href+'</td>';
                            s+= '<td>'+data.items[i].category_name+'</td>';
                            s+= '<td>'+data.items[i].created_dt+'</td>';
                            
                            s+= '<td class="text-center">';
                                s+= '<a class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit" href="'+(_this._getCMSUrl('menu/edit/'+data.items[i].id+'/'+_this.page))+'"><i class="fa fa-pencil-square"></i></a>';
                                s+= '<a class="btn btn-xs btn-danger confirmation" data-toggle="tooltip" title="Delete" onclick="deleteItem('+data.items[i].id+');"><i class="fa fa-minus-square"></i></a>';
                            s+= '</td>';
                        s+= '</tr>';

                        $('#data-list').append(s);
                    }
                    if (data.items.length < _this.dataLimit){
                        _this.reachLimit = true;
                        console.log('Reach limit');
                    }else{
                        _this.reachLimit = false;
                    }
                }else{
                    _this.reachLimit = true;
                    $('#data-list').append('<tr><td colspan="7">No data</td></tr>');
                    console.log('Reach limit');
                }
                
                _this._drawingPaging();
            });
        },
        setPage: function (page){
            if (parseInt(page) > 0){
                this.page = parseInt(page);
                this.reachLimit = false;
            }
        },
        prev: function(){
            if (this.page > 1){
                this.setPage(this.page-1);
            }
            //console.log('Current page:'+this.page);
        },
        next: function(){
            if (!this.reachLimit){
                this.setPage(this.page + 1);
            }
        },
        remove: function(id){
            var _this = this;
            _this._setLoader('loading');
            $.ajax({
                type: 'DELETE',
                url: _this._getUrl('service/menu/index/'+id),
                dataType: 'json',
                success: function (data){
                    _this._setLoader('reset');
                    
                    if (data.status){
                        alert('Data berhasil dihapus');
                        _this.load();
                    }else{
                        alert(data.message);
                    }
                },
                error: function (jqXHR, status){
                    _this._setLoader('reset');
                    alert(status);
                }
            });
        },
        _setLoader: function (status){
            if (status == 'loading'){
                $('#loader').show();
            }else{
                $('#loader').hide();
            }
        },
        _clearList: function (){
            $('#data-list tbody').empty();
        },
        _getRecNumber: function(offset){
            var recNumber = ((this.page-1)*this.dataLimit) + parseInt(offset) + 1;
            
            return recNumber;
        },
        _drawingPaging: function (){
            var s = '<nav><ul class="pager">';
            if (this.page > 1){
                s+= '<li><a href="javascript:previousPage();">Previous</a></li>';
            }else{
                s+= '<li class="disabled"><a href="#">Previous</a></li>';
            }
            if (!this.reachLimit){
                s+= '<li><a href="javascript:nextPage();">Next</a></li>';
            }else{
                s+= '<li class="disabled"><a href="#">Next</a></li>';
            }
            s+= '</ul></nav>';
            
            $('#pagination').html(s);
        },
        _getUrl: function (path){
            if (typeof BASEURL === 'undefined'){
                return path;
            }else{
                return (BASEURL + path);
            }
        },
        _getCMSUrl: function (path){
            if (typeof CMSURL === 'undefined'){
                return path;
            }else{
                return (CMSURL + path);
            }
        }
    };
    
    function previousPage(){
        MenuManager.prev();
        MenuManager.load();
    }
    
    function nextPage(){
        MenuManager.next();
        MenuManager.load();
    }
    
    function deleteItem(id){
        if (confirm('Anda yakin menghapus data ini ?')){
            MenuManager.remove(id);
            MenuManager.load();
        }
    }
    
    $(document).ready (function (){
        MenuManager.init();
        
        $('#btn-filter').on('click', function(){
            MenuManager.filter();
        });
        
        $('#search').on('keypress', function (e){
            if (e.which==13){
                event.preventDefault();
                MenuManager.filter();
            }
        });
    });
</script>