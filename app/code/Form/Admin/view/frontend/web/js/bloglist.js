define([
    "jquery",
    'Magento_Ui/js/modal/confirm',
    'Magento_Ui/js/modal/alert',
    'mage/translate'
], function ($, confirmation, alert, $t) {
    $('.ninja').on('click', function(e){
        let self=this;
        e.preventDefault();
        confirmation({
            title: $t('MassDelete?'),
            content: $t('Are you sure you want to delete this blog?'),
            actions: {
                confirm: function(){

                    //If confirmed
                    var url = $(self).attr('href');
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: url,
                        data: {},
                        beforeSend: function() {
                            $('body').trigger("processStart");
                        },
                        success: function (response) {
                            console.log(response);
                            $('body').trigger("processStop");
                            $(self).closest('.blog-list-table-row').remove();
                            alert({
                                content: response.message
                            });
                        },
                        error: function (response) {
                            $('body').trigger("processStop");
                            alert({
                                content: $t('Something went wrong.')
                            });
                        }
                    })

                }
            }
        });
    })
});
