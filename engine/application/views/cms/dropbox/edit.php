<div class="row" id="message"></div>
<div class="row">
    <div class="col-lg-12">
        <form class="validation" id="menuForm" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <div class="form-group form-group-lg">
                <label for="category">Parent</label>
                <select name="category" class="form-control selectpicker" data-live-search="true" data-size="5" title="Choose one as category...">
                    <option value="0">-- No Parent--</option>
                    <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category->id;?>"><?php echo $category->label_id; ?> / <?php echo $category->label_en; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group form-group-lg">
                        <label for="label_id">Label ID</label>
                        <input type="text" name="label_id" class="form-control" placeholder="Label Indonesia">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group form-group-lg">
                        <label for="label_en">Label EN</label>
                        <input type="text" name="label_en" class="form-control" placeholder="Label English">
                    </div>
                </div>
            </div>
            <div class="form-group form-group-lg">
                <label for="href">Link Href</label>
                <input type="text" name="href" class="form-control" placeholder="Link Url">
            </div>
            <div class="form-group form-group-lg">
                <label for="sort">#Sorting Index</label>
                <input type="number" id="sort" name="sort" min="0" step="1" class="form-control" placeholder="Index number">
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
    var MyManager = {
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
            
            $.getJSON(_this._getUrl('service/dropbox/index/'+id),function (data){
                _this._setLoader('reset');
                $('select[name=category]').val(data.category);$('select[name=category]').selectpicker('refresh');
                $('input[name=label_id]').val(data.label_id);
                $('input[name=label_en]').val(data.label_en);
                $('input[name=href]').val(data.href);
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
        MyManager.init();
        $('form.validation').validate({
            rules: {
                label_id: {
                    minlength: 2,
                    required: true
                },
                label_en: {
                    minlength: 2,
                    required: true
                },
                href: {
                    required: false
                }
            },
            highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            submitHandler: function (form){
                MyManager.save(form);
            }
        });
        
        $('button[name=btn-new]').on('click',function(){
            MyManager.createNew($('form.validation')[0]);
        });
    });
</script>