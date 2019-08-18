/**
 * Created by Lei on 2015/6/9.
 */


yii.actionColumn = (function ($) {

    var pub = {
        clickableSelector: 'a.action-delete, a.action-refresh',
        isActive: true,
        params : {},
        getCsrfParam: function () {
            return $('meta[name=csrf-param]').prop('content');
        },
        getCsrfToken: function () {
            return $('meta[name=csrf-token]').prop('content');
        },
        setCsrfToken: function (name, value) {
            $('meta[name=csrf-param]').prop('content', name);
            $('meta[name=csrf-token]').prop('content', value)
        },
        refreshCsrfToken: function () {
            var token = pub.getCsrfToken();
            if (token) {
                pub.params[pub.getCsrfParam()] = token;
            }
        },
        confirm: function (message, ok, cancel) {
            if (confirm(message)) {
                !ok || ok();
            } else {
                !cancel || cancel();
            }
        },
        handleAction: function ($e) {
            var method = $e.data('method'),
                url = $e.attr('href'),
                action = $e.data('action'),
                params = $e.data('params');

            //通过Ajax处理删除和刷新
            if (!url || !url.match(/(^\/|:\/\/)/)) {
                url = window.location.href;
            }
            $.extend(pub.params,params);
            $.post(
                url,
                pub.params,
                function(res){
                    if(action == 'delete'&&res.status == 1) $e.parents('tr').hide();
                    if(typeof (res.data) == 'string') {
                        pub.notify({type:res.status == 1?'success':'error',title:res.data});
                    } else {
                        pub.notify(res.data);
                    }
                },
                'json'
            );
            return;
        },
        init: function () {
            initDataMethods();
        },
        notify : function(data){
            if(!data) return;
            if(data.type == undefined || data.title == undefined) return;
            toastr.options = {"closeButton":true,"debug":false,"positionClass":"toast-top-right","onclick":null,"showDuration":"1000","hideDuration":"1000","timeOut":"5000","extendedTimeOut":"1000","showEasing":"swing","hideEasing":"linear","showMethod":"fadeIn","hideMethod":"fadeOut"};
            toastr[data.type](data.content == undefined ? null:data.content,data.title);
        }

    };

    function initDataMethods() {
        var handler = function (event) {
            var $this = $(this),
                method = $this.data('method'),
                message = $this.data('confirm');
            if (method === undefined && message === undefined) {
                return true;
            }
            if (message !== undefined) {
                pub.confirm(message, function () {
                    pub.handleAction($this);
                });
            } else {
                pub.handleAction($this);
            }
            event.stopImmediatePropagation();
            return false;
        };
        pub.refreshCsrfToken();
        $(pub.clickableSelector).off('click.yii')
            .on('click.yiiAction',  handler);
    }

    return pub;

})(jQuery);