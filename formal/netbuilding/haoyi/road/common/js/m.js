(function () {
    var loc        = window.location.href,
        loc_m      = /\/magazine\/m\//.test(loc),
        ua         = navigator.userAgent.toLowerCase(),
        is_oldie   = /msie (9.0|8.0)/.test(ua), 
        is_mobile  = /mobile|android|ip(ad|od|hone)|windows phone/.test(ua);

    if ((is_mobile || is_oldie) && !loc_m) {
        window.location.replace(loc.replace(/(\/magazine\/)/, '$1m/'));
    } else if (!(is_mobile || is_oldie) && loc_m) {
        window.location.replace(loc.replace(/(\/magazine\/)m\//, '$1'));
    }
})();
