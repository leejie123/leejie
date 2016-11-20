var BBS_Com = (function(){
    var Confirm = function(){
        this.template = '<div class="pop-up">' +
            '<div class="popUp-header">' +
            '<span class="pupUp-title">#title#</span>' +
            '<div class="shut"></div>' +
            '</div>' +
            '<div class="popUp-body">' +
            '<div class="remind">#content#</div>' +
            '<button class="pop-y">确定</button>' +
            '<button class="pop-n">取消</button>' +
            '</div>' +
            '</div>';
    }
    Confirm.prototype = {
        init: function(params,success, fail, always) {
            var _self = this;
            var template = _self.template;

            if (params.title) {
                template = template.replace('#title#', params.title);
            } else {
                template = template.replace('#title#', '');
            }

            if (params.msg) {
                template = template.replace('#content#', params.msg);
            } else {
                template = template.replace('#content#', '');
            }

            var $popUp = $(template).css({

            })

            // bind
            $popUp.find('.shut').bind('click', function() {
                $popUp.hide();
            })

            // callback
            if (success) {
                $popUp.find('.pop-y').bind('click', function() {
                    success();
                    $popUp.hide();
                })
            }

            if (fail) {
                $popUp.find('.pop-n').bind('click', function() {
                    fail();
                    $popUp.hide();
                })
            }

            if (always) {
                always();
            }

            $popUp.appendTo($('body'));

        }
    }

    var BBS_Com = {
        Confirm: Confirm
    }

    return BBS_Com;
})()