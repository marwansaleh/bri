<style type="text/css">
    .image-item {max-height: 120px; margin-bottom: 10px; float:left; position: relative;}
    .image-item .image-btn-group {position: absolute; top: 47%; left: 50%; transition: opacity 0.5s ease; opacity: 0.5}
    .image-item:hover .image-btn-group {opacity: 1; }
</style>
<div class="row" id="message"></div>
<div class="row">
    <div class="col-lg-12">
        <form class="validation" id="menuForm" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group form-group-lg">
                        <label for="category">Category</label>
                        <select name="category" class="form-control selectpicker" data-live-search="true" data-size="5" title="Choose one category...">
                            <option value="0">-- No Category--</option>
                            <?php foreach ($page_categories as $key=>$value): ?>
                            <option value="<?php echo $key;?>"><?php echo $value; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group form-group-lg">
                        <label>Date (yyyy-mm-dd)</label>
                        <div class="input-group datetimepicker">
                            <input type="text" name="date_time" class="form-control" value="<?php echo date('Y-m-d H:i');?>">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group form-group-lg">
                        <label for="title_id">Title ID</label>
                        <input type="text" id="title_id" name="title_id" class="form-control" placeholder="Title Indonesia">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group form-group-lg">
                        <label for="title_en">Title EN</label>
                        <input type="text" id="title_en" name="title_en" class="form-control" placeholder="Title English">
                    </div>
                </div>
            </div>
            <div class="form-group form-group-lg">
                <label for="name">Page Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Page name">
            </div>
            <div class="form-group form-group-lg">
                <label for="link">Link Href</label>
                <input type="text" name="link" class="form-control" placeholder="Link Url">
            </div>
            
            <div class="form-group form-group-lg">
                <label>Select Images</label>
                <input type="hidden" id="images" name="images" />
                <div class="well well-lg">
                    <div id="image-list-container" class="row">
                        
                    </div>
                    <div class="row">
                        <div class="input-group input-group-lg">
                            <input readonly="true" type="text" id="selected_image" class="form-control disabled">
                            <div class="input-group-btn">
                                <a class="btn btn-default" href="<?php echo get_lib_url('filemanager/dialog.php?type=1&field_id=selected_image&fldr=Page-Images&relative_url=1&iframe=true&width=90%&height=90%') ?>"  rel="prettyPhoto" >Browse</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group form-group-lg">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="editable" value="1">
                        Halaman ini memiliki content yang dapat diubah
                    </label>
                </div>
            </div>
            <div id="editor-container" class="row hidden">
                <div class="col-sm-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#content_id" aria-controls="content_id" role="tab" data-toggle="tab">Content ID</a>
                        </li>
                        <li role="presentation">
                            <a href="#content_en" aria-controls="content_en" role="tab" data-toggle="tab">Content EN</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="content_id">
                            <div class="form-group form-group-lg"><textarea class="form-control texteditor" name="content_id" rows="15"></textarea></div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="content_en">
                            <div class="form-group form-group-lg"><textarea class="form-control texteditor" name="content_en" rows="15"></textarea></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group form-group-lg">
                <button type="submit" class="btn btn-primary btn-lg" name="submit"><i class="fa fa-save"></i> Save</button>
                <button type="button" class="btn btn-warning btn-lg" name="btn-new"><i class="fa fa-book"></i> Create New</button>
                <a class="btn btn-success btn-lg" href="<?php echo $back_url; ?>"><i class="fa fa-backward"></i> Back</a>
            </div>
        </form>
    </div>
</div>
<script src="<?php echo get_lib_url('tinymce/tinymce.min.js'); ?>"></script>
<script type="text/javascript">
    var MyManager = {
        id: null,
        serviceName: 'page',
        baseImages: 'userfiles/images/',
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
            
            $.getJSON(_this._getUrl('service/'+_this.serviceName+'/index/'+id),function (data){
                _this._setLoader('reset');
                $('select[name=category]').val(data.category);$('select[name=category]').selectpicker('refresh');
                $('input[name=title_id]').val(data.title_id);
                $('input[name=title_en]').val(data.title_en);
                $('input[name=name]').val(data.name);
                $('input[name=link]').val(data.link);
                $('input[name=date_time]').val(data.date_time);
                $('input[name=editable]').prop('checked', data.editable=='1');
                $('textarea[name=content_id]').val(data.content_id);
                $('textarea[name=content_en]').val(data.content_en);
                
                _this.setImages(data.images);
                _this.setEditorDisplay();
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
            
            $.post(_this._getUrl('service/'+_this.serviceName),$(form).serialize(),function(data){
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
                url: _this._getUrl('service/'+_this.serviceName+'/index/'+_this.id),
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
        },
        urlTitle: function (source,target){
            var url = $.trim($('#'+source).val());
            url = url.replace('%','-persen');
            //replace everything not alpha numeric
            url = 'pg_'+url.replace(/[^a-z0-9]/gi, '-').toLowerCase();
            //url = url.replace(/[ \t\r]+/g,"-");
            $('#'+target).val(url);
        },
        setImages: function(imgArr){
            //clear image list
            $('#image-list-container').empty();
            if (imgArr && imgArr.length >0){
                //draw images
                for (var i in imgArr){
                    var imageId = MainJS.guid();
                    var s='<div class="image-item" id="'+imageId+'" data-image="'+imgArr[i]+'">';
                        s+= '<img class="image-item img-responsive" src="'+(this._getUrl(imgArr[i]))+'"/>';
                        s+= '<div class="image-btn-group">';
                            s+= '<a rel="prettyPhoto" class="btn btn-primary btn-xs" title="View original of this image" target="blank" href="'+this._getUrl(imgArr[i])+'">';
                                s+= '<i class="fa fa-eye"></i>';
                            s+='</a>';
                            s+= '<a class="btn btn-danger btn-xs" title="Remove this image" href="javascript:void(\'\')" onclick="MyManager.removeImage(\''+imageId+'\')">';
                                s+= '<i class="fa fa-minus-circle"></i>';
                            s+='</a>';
                        s+= '</div>';
                    s+= '</div>';

                    $('#image-list-container').append(s);
                }

                //update image list values
                $('input#images').val(imgArr.join(','));
                //console.log('Image list updated');
                //set prettyPhoto explicit
                //$("a[rel^='prettyPhoto']").prettyPhoto({social_tools:''}); 
            }
        },
        removeImage: function (id){
            //get image name
            var imageName = document.getElementById(id).getAttribute('data-image');
            //get image list value and convert into array
            var imageList = $('input#images').val().split(',');
            //remove the image from imagelist array
            imageList.splice(imageList.indexOf(imageName),1);
            //redraw the imagelist
            this.setImages(imageList);
        },
        RFM_Callback: function (field_id){
            var image_url = this.baseImages + document.getElementById(field_id).value;
            //recreate image list value
            var imageList = $('input#images').val();
            if (imageList){
                imageList = imageList.split(',');
            }else{
                imageList = new Array();
            }
            //add new image to list
            imageList.push(image_url);
            //update selected image field to base image url
            document.getElementById(field_id).value = image_url;
            //update and display image list
            this.setImages(imageList);
        },
        setEditorDisplay: function(){
            $('#editor-container').toggleClass('hidden', !($('input[name=editable]').prop('checked')));
        }
    };
    
    function responsive_filemanager_callback(field_id){
        MyManager.RFM_Callback(field_id);
    }
    
    tinymce.init({
        selector: "textarea.texteditor",
        theme: 'modern',
        //width: '100%',
        height: '220',
        plugins : [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste responsivefilemanager"
        ],
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect | responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
        //toolbar2: "",
        image_advtab: true,
        external_filemanager_path:MyManager._getUrl('library/filemanager/'),
        filemanager_title:"File Manager" ,
        external_plugins: { "filemanager" : MyManager._getUrl('library/filemanager/plugin.min.js')},
        filemanager_access_key:"",
        relative_urls: false
    });
    
    $(document).ready(function (){
        MyManager.init();
        $('form.validation').validate({
            rules: {
                title_id: {
                    minlength: 2,
                    required: true
                },
                title_en: {
                    minlength: 2,
                    required: true
                },
                name: {
                    minlength: 2,
                    required: true
                },
                href: {
                    minlength: 2,
                    required: true
                },
                content_id: {
                    minlength: 10,
                    required: true
                },
                content_en: {
                    minlength: 10,
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
                tinyMCE.triggerSave();
//                $(tinymce.get()).each(function(i, el){
//                    document.getElementById(el.editorId).value = el.getContent();
//                });
                MyManager.save(form);
            }
        });
        
        $('button[name=btn-new]').on('click',function(){
            MyManager.createNew($('form.validation')[0]);
        });
        $('input[name=title_id]').on('blur', function(){
            MyManager.urlTitle($(this).attr('id'), 'name');
        });
        $('input[name=editable]').on('click', function(){
            MyManager.setEditorDisplay();
        });
    });
</script>