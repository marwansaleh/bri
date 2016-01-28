<div class="row" id="message"></div>
<div class="row">
    <div class="col-lg-12">
        <form class="validation" id="menuForm" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <div class="form-group form-group-lg">
                <label for="parent_id">Parent</label>
                <select name="parent_id" class="form-control selectpicker" data-live-search="true" data-size="5" title="Choose one as parent...">
                    <option value="0">-- No Parent--</option>
                    <?php foreach ($parents as $parent): ?>
                    <option value="<?php echo $parent->id;?>"><?php echo $parent->caption_id; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group form-group-lg">
                        <label for="caption_id">Caption ID</label>
                        <input type="text" name="caption_id" class="form-control" placeholder="Caption Indonesia">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group form-group-lg">
                        <label for="caption_en">Caption EN</label>
                        <input type="text" name="caption_en" class="form-control" placeholder="Caption English">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group form-group-lg">
                        <label for="title_id">Title ID</label>
                        <input type="text" name="title_id" class="form-control" placeholder="Title Indonesia">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group form-group-lg">
                        <label for="title_en">Title EN</label>
                        <input type="text" name="title_en" class="form-control" placeholder="Title English">
                    </div>
                </div>
            </div>
            <div class="form-group form-group-lg">
                <label for="href">Link Href</label>
                <input type="text" name="href" class="form-control" placeholder="Link Url">
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group form-group-lg">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category">
                            <option value="0">HOME</option>
                            <option value="1">CORPORATE</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group form-group-lg">
                        <label for="sort">#Sorting Index</label>
                        <input type="number" id="sort" name="sort" min="0" step="1" class="form-control" placeholder="Index number">
                    </div>
                </div>
            </div>
            <div class="form-group form-group-lg">
                <button type="submit" class="btn btn-primary btn-lg" name="submit"><i class="fa fa-save"></i> Save</button>
                <button type="button" class="btn btn-warning btn-lg" name="btn-new"><i class="fa fa-book"></i> Create New</button>
                <a class="btn btn-success btn-lg" href="<?php echo $back_url; ?>"><i class="fa fa-backward"></i> Cancel</a>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    var MenuManager = {
        id: null,
        setId: function (id){
            $('input[name=id]').val(id);
            this.id = parseInt(id);
        },
        init: function (){
            var _this = this;
            _this.id = $('input[name=id]').val()?parseInt($('input[name=id]').val()) : null;
            
            if (_this.id){
                _this.load(_this.id);
            }
        },
        load: function (id){
            var _this = this;
            _this._setLoader('loading');
            
            $.getJSON(_this._getUrl('service/menu/index/'+id),function (data){
                _this._setLoader('reset');
                $('select[name=parent_id]').val(data.parent_id);$('select[name=parent_id]').selectpicker('refresh');
                $('input[name=caption_id]').val(data.caption_id);
                $('input[name=caption_en]').val(data.caption_en);
                $('input[name=title_id]').val(data.title_id);
                $('input[name=title_en]').val(data.title_en);
                $('input[name=href]').val(data.href);
                $('select[name=category]').val(data.category);
                $('input[name=sort]').val(data.sort);
            });
        },
        save: function (form){
            if (this.id){
                this._update(form);
            }else{
                this._saveNew(form);
            }
        },
        _saveNew: function (form){
            var _this = this;
            _this._setLoader('loading');
            
            $.post(_this._getUrl('service/menu'),$(form).serialize(),function(data){
                _this._setLoader('reset');
                if (data.status){
                    _this.setId(data.id);
                    alert('Data berhasil disimpan');
                }else{
                    alert(data.message);
                }
            });
        },
        _update: function (form){
            var _this = this;
            _this._setLoader('loading');
            $.ajax({
                type: 'PUT',
                url: _this._getUrl('service/menu/index/'+_this.id),
                data: $(form).serialize(),
                dataType: 'json',
                success: function (data){
                    _this._setLoader('reset');
                    
                    if (data.status){
                        alert('Data berhasil disimpan');
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
        },
        _setLoader: function (status){
            if (status == 'loading'){
                $('#loader').show();
            }else{
                $('#loader').hide();
            }
        },
        createNew: function (form){
            form.reset();
            $('select[name=parent_id]').selectpicker('refresh');
            this.setId(0);
        }
    };
    $(document).ready(function (){
        MenuManager.init();
        $('form.validation').validate({
            rules: {
                caption_id: {
                    minlength: 2,
                    required: true
                },
                caption_en: {
                    minlength: 2,
                    required: true
                },
                href: {
                    minlength: 2,
                    required: true
                },
                category: {
                    required: true
                }
            },
            highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            submitHandler: function (form){
                MenuManager.save(form);
            }
        });
        
        $('button[name=btn-new]').on('click',function(){
            MenuManager.createNew($('form.validation')[0]);
        });
    });
</script>