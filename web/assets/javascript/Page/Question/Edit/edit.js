jQuery(document).ready(function() {

    var counter = LAST_ELEMENT;
    var removeFunction = function(e)
    {
        console.log(jQuery(e.target).attr('data'));
        jQuery(jQuery(e.target).attr('data')).remove();
    }

    jQuery('.remove-input-button').click(removeFunction);

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });

    jQuery('.add-another-collection-widget').click(function (e) {
        e.preventDefault();

        var list = jQuery(jQuery(this).attr('data-list'));

        if (!counter) { counter = list.children().length; }

        var newWidget = list.attr('data-prototype');
        counter++;
        newWidget = newWidget.replace(/__name__/g, counter);

        var removeButton =
            '<a href="#" id="button-remove-' + counter + '" class="btn btn-danger" data="#form-controller-' + counter + '">' +
            '   <i class="fa fa-minus" data="#form-controller-' + counter + '"></i>' +
            '</a>';


        list.data('widget-counter', counter);
        var widgetTags = jQuery(list.attr('data-widget-tags'));
        jQuery(widgetTags).attr('id', 'form-controller-' + counter);
        var html =
            '<div class="col-sm-2 control-label">' +
                removeButton +
            '</div>' +
                '<div class="col-sm-10 control-label">' +
                    '<div class="input-group">' +
                        '<span class="input-group-addon">' +
                            '<input type="checkbox" id="question_creation_solution_' + counter +'" name="question_creation[solution][' + counter + ']" value="1"/>' +
                        '</span>'
                        + newWidget +
                    '</div>' +
                '</div>' +
            '</div>';
        var newElem = widgetTags.html(html);
        newElem.appendTo(jQuery('.box-body'));
        jQuery('#button-remove-' + counter).click(removeFunction);
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%'
            });
        });
    });
});