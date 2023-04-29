<script>
    var validated = false;
    var buton_submit = true;
    var my_form, name_class;
    var auto_focus = false;
    $(document).on(' click', '.showform', function() {
        name_class = 'App/Http/Requests/' + $(this).data('form');
        my_form = $('#' + $(this).data('form'));
        $($(this).data('target')).modal('show')
        const inp = my_form.find('.vr-form');
        if (inp.find('.help-block').length <= 0) {
            inp.append('<div class="help-block text-danger with-errors"></div>');
        }
    });
    $("button[type=submit]").on('click', function(e) {
        e.preventDefault()
        validate();
        console.log('ok')
    });
    $('.currentform').click(() => {
        console.log(name_class)
    })

    function validate(data = {}) {
        var data = my_form.serializeArray();
        var mydata = {}

        data.push({
            name: 'class',
            value: name_class
        });

        for (var i = 0; i < data.length; i++) {
            item = data[i];
            if (item.name == '_method') {
                data.splice(i, 1);
            }
        }
        $.ajax({
            url: '<?= url('validation') ?>',
            type: 'post',
            data: $.param(data),
            dataType: 'json',
            success: function(data) {
                if (data.success) {
                    $.each(my_form.serializeArray(), function(i, field) {
                        var father = $('#' + field.name).parent('.vr-form');
                        father.removeClass('has-error');
                        father.addClass('has-success');
                        father.find('.help-block').html('');
                    });


                    validated = true;
                    buton_submit = true;
                    if (buton_submit == true) {
                        // e.preventDefault()
                        // my_form.submit();
                        $.each(my_form.serializeArray(), function(i, data) {
                            if (mydata[data.name] != null) {
                                if (Array.isArray(mydata[data.name])) {
                                    mydata[data.name].push(data.value)
                                } else {
                                    mydata[data.name] = [mydata[data.name], data.value]
                                }
                            } else {
                                mydata[data.name] = data.value;
                            }
                        })
                        const mymo = $('#' + my_form.closest('.modal').attr('id'))
                        mymo.modal('hide')
                        console.log(mydata)

                    }
                } else {
                    var campos_error = [];

                    $.each(data.errors, function(key, data) {
                        var campo = $('.msg' + key);
                        var father = campo.parents('.vr-form');
                        father.removeClass('has-success');
                        father.addClass('has-error');
                        father.find('.help-block').html(data[0]);
                        campos_error.push(key);

                    });
                    $.each(my_form.serializeArray(), function(i, field) {
                        if ($.inArray(field.name, campos_error) === -1) {
                            var father = $('.msg' + field.name).parent('.vr-form');
                            father.removeClass('has-error');
                            father.addClass('has-success');
                            father.find('.help-block').html('');
                        }
                    });

                    validated = false;
                    buton_submit = false;
                }
            },
            error: function(xhr) {
                console.log(xhr.status);
            }
        });
        return false;

    }
</script>