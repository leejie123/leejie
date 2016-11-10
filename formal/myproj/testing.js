var requirejs, require, define; !
function(global) {
    function isFunction(e) {
        return "[object Function]" === ostring.call(e)
    }
    function isArray(e) {
        return "[object Array]" === ostring.call(e)
    }
    function each(e, t) {
        if (e) {
            var n;
            for (n = 0; n < e.length && (!e[n] || !t(e[n], n, e)); n += 1);
        }
    }
    function eachReverse(e, t) {
        if (e) {
            var n;
            for (n = e.length - 1; n > -1 && (!e[n] || !t(e[n], n, e)); n -= 1);
        }
    }
    function hasProp(e, t) {
        return hasOwn.call(e, t)
    }
    function getOwn(e, t) {
        return hasProp(e, t) && e[t]
    }
    function eachProp(e, t) {
        var n;
        for (n in e) if (hasProp(e, n) && t(e[n], n)) break
    }
    function mixin(e, t, n, i) {
        return t && eachProp(t,
        function(t, r) { (n || !hasProp(e, r)) && (!i || "object" != typeof t || !t || isArray(t) || isFunction(t) || t instanceof RegExp ? e[r] = t: (e[r] || (e[r] = {}), mixin(e[r], t, n, i)))
        }),
        e
    }
    function bind(e, t) {
        return function() {
            return t.apply(e, arguments)
        }
    }
    function scripts() {
        return document.getElementsByTagName("script")
    }
    function defaultOnError(e) {
        throw e
    }
    function getGlobal(e) {
        if (!e) return e;
        var t = global;
        return each(e.split("."),
        function(e) {
            t = t[e]
        }),
        t
    }
    function makeError(e, t, n, i) {
        var r = new Error(t + "\nhttp://requirejs.org/docs/errors.html#" + e);
        return r.requireType = e,
        r.requireModules = i,
        n && (r.originalError = n),
        r
    }
    function newContext(e) {
        function t(e) {
            var t, n, i = e.length;
            for (t = 0; i > t; t++) if (n = e[t], "." === n) e.splice(t, 1),
            t -= 1;
            else if (".." === n) {
                if (1 === t && (".." === e[2] || ".." === e[0])) break;
                t > 0 && (e.splice(t - 1, 2), t -= 2)
            }
        }
        function n(e, n, i) {
            var r, o, a, s, u, c, d, l, f, p, h, g = n && n.split("/"),
            b = g,
            m = k.map,
            v = m && m["*"];
            if (e && "." === e.charAt(0) && (n ? (b = g.slice(0, g.length - 1), e = e.split("/"), d = e.length - 1, k.nodeIdCompat && jsSuffixRegExp.test(e[d]) && (e[d] = e[d].replace(jsSuffixRegExp, "")), e = b.concat(e), t(e), e = e.join("/")) : 0 === e.indexOf("./") && (e = e.substring(2))), i && m && (g || v)) {
                a = e.split("/");
                e: for (s = a.length; s > 0; s -= 1) {
                    if (c = a.slice(0, s).join("/"), g) for (u = g.length; u > 0; u -= 1) if (o = getOwn(m, g.slice(0, u).join("/")), o && (o = getOwn(o, c))) {
                        l = o,
                        f = s;
                        break e
                    } ! p && v && getOwn(v, c) && (p = getOwn(v, c), h = s)
                } ! l && p && (l = p, f = h),
                l && (a.splice(0, f, l), e = a.join("/"))
            }
            return r = getOwn(k.pkgs, e),
            r ? r: e
        }
        function i(e) {
            isBrowser && each(scripts(),
            function(t) {
                return t.getAttribute("data-requiremodule") === e && t.getAttribute("data-requirecontext") === x.contextName ? (t.parentNode.removeChild(t), !0) : void 0
            })
        }
        function r(e) {
            var t = getOwn(k.paths, e);
            return t && isArray(t) && t.length > 1 ? (t.shift(), x.require.undef(e), x.require([e]), !0) : void 0
        }
        function o(e) {
            var t, n = e ? e.indexOf("!") : -1;
            return n > -1 && (t = e.substring(0, n), e = e.substring(n + 1, e.length)),
            [t, e]
        }
        function a(e, t, i, r) {
            var a, s, u, c, d = null,
            l = t ? t.name: null,
            f = e,
            p = !0,
            h = "";
            return e || (p = !1, e = "_@r" + (D += 1)),
            c = o(e),
            d = c[0],
            e = c[1],
            d && (d = n(d, l, r), s = getOwn(q, d)),
            e && (d ? h = s && s.normalize ? s.normalize(e,
            function(e) {
                return n(e, l, r)
            }) : n(e, l, r) : (h = n(e, l, r), c = o(h), d = c[0], h = c[1], i = !0, a = x.nameToUrl(h))),
            u = !d || s || i ? "": "_unnormalized" + (L += 1),
            {
                prefix: d,
                name: h,
                parentMap: t,
                unnormalized: !!u,
                url: a,
                originalName: f,
                isDefine: p,
                id: (d ? d + "!" + h: h) + u
            }
        }
        function s(e) {
            var t = e.id,
            n = getOwn(E, t);
            return n || (n = E[t] = new x.Module(e)),
            n
        }
        function u(e, t, n) {
            var i = e.id,
            r = getOwn(E, i); ! hasProp(q, i) || r && !r.defineEmitComplete ? (r = s(e), r.error && "error" === t ? n(r.error) : r.on(t, n)) : "defined" === t && n(q[i])
        }
        function c(e, t) {
            var n = e.requireModules,
            i = !1;
            t ? t(e) : (each(n,
            function(t) {
                var n = getOwn(E, t);
                n && (n.error = e, n.events.error && (i = !0, n.emit("error", e)))
            }), i || req.onError(e))
        }
        function d() {
            globalDefQueue.length && (apsp.apply(S, [S.length, 0].concat(globalDefQueue)), globalDefQueue = [])
        }
        function l(e) {
            delete E[e],
            delete C[e]
        }
        function f(e, t, n) {
            var i = e.map.id;
            e.error ? e.emit("error", e.error) : (t[i] = !0, each(e.depMaps,
            function(i, r) {
                var o = i.id,
                a = getOwn(E, o); ! a || e.depMatched[r] || n[o] || (getOwn(t, o) ? (e.defineDep(r, q[o]), e.check()) : f(a, t, n))
            }), n[i] = !0)
        }
        function p() {
            var e, t, n = 1e3 * k.waitSeconds,
            o = n && x.startTime + n < (new Date).getTime(),
            a = [],
            s = [],
            u = !1,
            d = !0;
            if (!v) {
                if (v = !0, eachProp(C,
                function(e) {
                    var n = e.map,
                    c = n.id;
                    if (e.enabled && (n.isDefine || s.push(e), !e.error)) if (!e.inited && o) r(c) ? (t = !0, u = !0) : (a.push(c), i(c));
                    else if (!e.inited && e.fetched && n.isDefine && (u = !0, !n.prefix)) return d = !1
                }), o && a.length) return e = makeError("timeout", "Load timeout for modules: " + a, null, a),
                e.contextName = x.contextName,
                c(e);
                d && each(s,
                function(e) {
                    f(e, {},
                    {})
                }),
                o && !t || !u || !isBrowser && !isWebWorker || _ || (_ = setTimeout(function() {
                    _ = 0,
                    p()
                },
                50)),
                v = !1
            }
        }
        function h(e) {
            hasProp(q, e[0]) || s(a(e[0], null, !0)).init(e[1], e[2])
        }
        function g(e, t, n, i) {
            e.detachEvent && !isOpera ? i && e.detachEvent(i, t) : e.removeEventListener(n, t, !1)
        }
        function b(e) {
            var t = e.currentTarget || e.srcElement;
            return g(t, x.onScriptLoad, "load", "onreadystatechange"),
            g(t, x.onScriptError, "error"),
            {
                node: t,
                id: t && t.getAttribute("data-requiremodule")
            }
        }
        function m() {
            var e;
            for (d(); S.length;) {
                if (e = S.shift(), null === e[0]) return c(makeError("mismatch", "Mismatched anonymous define() module: " + e[e.length - 1]));
                h(e)
            }
        }
        var v, y, x, w, _, k = {
            waitSeconds: 7,
            baseUrl: "./",
            paths: {},
            bundles: {},
            pkgs: {},
            shim: {},
            config: {}
        },
        E = {},
        C = {},
        O = {},
        S = [],
        q = {},
        T = {},
        M = {},
        D = 1,
        L = 1;
        return w = {
            require: function(e) {
                return e.require ? e.require: e.require = x.makeRequire(e.map)
            },
            exports: function(e) {
                return e.usingExports = !0,
                e.map.isDefine ? e.exports ? q[e.map.id] = e.exports: e.exports = q[e.map.id] = {}: void 0
            },
            module: function(e) {
                return e.module ? e.module: e.module = {
                    id: e.map.id,
                    uri: e.map.url,
                    config: function() {
                        return getOwn(k.config, e.map.id) || {}
                    },
                    exports: e.exports || (e.exports = {})
                }
            }
        },
        y = function(e) {
            this.events = getOwn(O, e.id) || {},
            this.map = e,
            this.shim = getOwn(k.shim, e.id),
            this.depExports = [],
            this.depMaps = [],
            this.depMatched = [],
            this.pluginMaps = {},
            this.depCount = 0
        },
        y.prototype = {
            init: function(e, t, n, i) {
                i = i || {},
                this.inited || (this.factory = t, n ? this.on("error", n) : this.events.error && (n = bind(this,
                function(e) {
                    this.emit("error", e)
                })), this.depMaps = e && e.slice(0), this.errback = n, this.inited = !0, this.ignore = i.ignore, i.enabled || this.enabled ? this.enable() : this.check())
            },
            defineDep: function(e, t) {
                this.depMatched[e] || (this.depMatched[e] = !0, this.depCount -= 1, this.depExports[e] = t)
            },
            fetch: function() {
                if (!this.fetched) {
                    this.fetched = !0,
                    x.startTime = (new Date).getTime();
                    var e = this.map;
                    return this.shim ? void x.makeRequire(this.map, {
                        enableBuildCallback: !0
                    })(this.shim.deps || [], bind(this,
                    function() {
                        return e.prefix ? this.callPlugin() : this.load()
                    })) : e.prefix ? this.callPlugin() : this.load()
                }
            },
            load: function() {
                var e = this.map.url;
                T[e] || (T[e] = !0, x.load(this.map.id, e))
            },
            check: function() {
                if (this.enabled && !this.enabling) {
                    var e, t, n = this.map.id,
                    i = this.depExports,
                    r = this.exports,
                    o = this.factory;
                    if (this.inited) {
                        if (this.error) this.emit("error", this.error);
                        else if (!this.defining) {
                            if (this.defining = !0, this.depCount < 1 && !this.defined) {
                                if (isFunction(o)) {
                                    if (this.events.error && this.map.isDefine || req.onError !== defaultOnError) try {
                                        r = x.execCb(n, o, i, r)
                                    } catch(a) {
                                        e = a
                                    } else r = x.execCb(n, o, i, r);
                                    if (this.map.isDefine && void 0 === r && (t = this.module, t ? r = t.exports: this.usingExports && (r = this.exports)), e) return e.requireMap = this.map,
                                    e.requireModules = this.map.isDefine ? [this.map.id] : null,
                                    e.requireType = this.map.isDefine ? "define": "require",
                                    c(this.error = e)
                                } else r = o;
                                this.exports = r,
                                this.map.isDefine && !this.ignore && (q[n] = r, req.onResourceLoad && req.onResourceLoad(x, this.map, this.depMaps)),
                                l(n),
                                this.defined = !0
                            }
                            this.defining = !1,
                            this.defined && !this.defineEmitted && (this.defineEmitted = !0, this.emit("defined", this.exports), this.defineEmitComplete = !0)
                        }
                    } else this.fetch()
                }
            },
            callPlugin: function() {
                var e = this.map,
                t = e.id,
                i = a(e.prefix);
                this.depMaps.push(i),
                u(i, "defined", bind(this,
                function(i) {
                    var r, o, d, f = getOwn(M, this.map.id),
                    p = this.map.name,
                    h = this.map.parentMap ? this.map.parentMap.name: null,
                    g = x.makeRequire(e.parentMap, {
                        enableBuildCallback: !0
                    });
                    return this.map.unnormalized ? (i.normalize && (p = i.normalize(p,
                    function(e) {
                        return n(e, h, !0)
                    }) || ""), o = a(e.prefix + "!" + p, this.map.parentMap), u(o, "defined", bind(this,
                    function(e) {
                        this.init([],
                        function() {
                            return e
                        },
                        null, {
                            enabled: !0,
                            ignore: !0
                        })
                    })), d = getOwn(E, o.id), void(d && (this.depMaps.push(o), this.events.error && d.on("error", bind(this,
                    function(e) {
                        this.emit("error", e)
                    })), d.enable()))) : f ? (this.map.url = x.nameToUrl(f), void this.load()) : (r = bind(this,
                    function(e) {
                        this.init([],
                        function() {
                            return e
                        },
                        null, {
                            enabled: !0
                        })
                    }), r.error = bind(this,
                    function(e) {
                        this.inited = !0,
                        this.error = e,
                        e.requireModules = [t],
                        eachProp(E,
                        function(e) {
                            0 === e.map.id.indexOf(t + "_unnormalized") && l(e.map.id)
                        }),
                        c(e)
                    }), r.fromText = bind(this,
                    function(n, i) {
                        var o = e.name,
                        u = a(o),
                        d = useInteractive;
                        i && (n = i),
                        d && (useInteractive = !1),
                        s(u),
                        hasProp(k.config, t) && (k.config[o] = k.config[t]);
                        try {
                            req.exec(n)
                        } catch(l) {
                            return c(makeError("fromtexteval", "fromText eval for " + t + " failed: " + l, l, [t]))
                        }
                        d && (useInteractive = !0),
                        this.depMaps.push(u),
                        x.completeLoad(o),
                        g([o], r)
                    }), void i.load(e.name, g, r, k))
                })),
                x.enable(i, this),
                this.pluginMaps[i.id] = i
            },
            enable: function() {
                C[this.map.id] = this,
                this.enabled = !0,
                this.enabling = !0,
                each(this.depMaps, bind(this,
                function(e, t) {
                    var n, i, r;
                    if ("string" == typeof e) {
                        if (e = a(e, this.map.isDefine ? this.map: this.map.parentMap, !1, !this.skipMap), this.depMaps[t] = e, r = getOwn(w, e.id)) return void(this.depExports[t] = r(this));
                        this.depCount += 1,
                        u(e, "defined", bind(this,
                        function(e) {
                            this.defineDep(t, e),
                            this.check()
                        })),
                        this.errback && u(e, "error", bind(this, this.errback))
                    }
                    n = e.id,
                    i = E[n],
                    hasProp(w, n) || !i || i.enabled || x.enable(e, this)
                })),
                eachProp(this.pluginMaps, bind(this,
                function(e) {
                    var t = getOwn(E, e.id);
                    t && !t.enabled && x.enable(e, this)
                })),
                this.enabling = !1,
                this.check()
            },
            on: function(e, t) {
                var n = this.events[e];
                n || (n = this.events[e] = []),
                n.push(t)
            },
            emit: function(e, t) {
                each(this.events[e],
                function(e) {
                    e(t)
                }),
                "error" === e && delete this.events[e]
            }
        },
        x = {
            config: k,
            contextName: e,
            registry: E,
            defined: q,
            urlFetched: T,
            defQueue: S,
            Module: y,
            makeModuleMap: a,
            nextTick: req.nextTick,
            onError: c,
            configure: function(e) {
                e.baseUrl && "/" !== e.baseUrl.charAt(e.baseUrl.length - 1) && (e.baseUrl += "/");
                var t = k.shim,
                n = {
                    paths: !0,
                    bundles: !0,
                    config: !0,
                    map: !0
                };
                eachProp(e,
                function(e, t) {
                    n[t] ? (k[t] || (k[t] = {}), mixin(k[t], e, !0, !0)) : k[t] = e
                }),
                e.bundles && eachProp(e.bundles,
                function(e, t) {
                    each(e,
                    function(e) {
                        e !== t && (M[e] = t)
                    })
                }),
                e.shim && (eachProp(e.shim,
                function(e, n) {
                    isArray(e) && (e = {
                        deps: e
                    }),
                    !e.exports && !e.init || e.exportsFn || (e.exportsFn = x.makeShimExports(e)),
                    t[n] = e
                }), k.shim = t),
                e.packages && each(e.packages,
                function(e) {
                    var t, n;
                    e = "string" == typeof e ? {
                        name: e
                    }: e,
                    n = e.name,
                    t = e.location,
                    t && (k.paths[n] = e.location),
                    k.pkgs[n] = e.name + "/" + (e.main || "main").replace(currDirRegExp, "").replace(jsSuffixRegExp, "")
                }),
                eachProp(E,
                function(e, t) {
                    e.inited || e.map.unnormalized || (e.map = a(t))
                }),
                (e.deps || e.callback) && x.require(e.deps || [], e.callback)
            },
            makeShimExports: function(e) {
                function t() {
                    var t;
                    return e.init && (t = e.init.apply(global, arguments)),
                    t || e.exports && getGlobal(e.exports)
                }
                return t
            },
            makeRequire: function(t, r) {
                function o(n, i, u) {
                    var d, l, f;
                    return r.enableBuildCallback && i && isFunction(i) && (i.__requireJsBuild = !0),
                    "string" == typeof n ? isFunction(i) ? c(makeError("requireargs", "Invalid require call"), u) : t && hasProp(w, n) ? w[n](E[t.id]) : req.get ? req.get(x, n, t, o) : (l = a(n, t, !1, !0), d = l.id, hasProp(q, d) ? q[d] : c(makeError("notloaded", 'Module name "' + d + '" has not been loaded yet for context: ' + e + (t ? "": ". Use require([])")))) : (m(), x.nextTick(function() {
                        m(),
                        f = s(a(null, t)),
                        f.skipMap = r.skipMap,
                        f.init(n, i, u, {
                            enabled: !0
                        }),
                        p()
                    }), o)
                }
                return r = r || {},
                mixin(o, {
                    isBrowser: isBrowser,
                    toUrl: function(e) {
                        var i, r = e.lastIndexOf("."),
                        o = e.split("/")[0],
                        a = "." === o || ".." === o;
                        return - 1 !== r && (!a || r > 1) && (i = e.substring(r, e.length), e = e.substring(0, r)),
                        x.nameToUrl(n(e, t && t.id, !0), i, !0)
                    },
                    defined: function(e) {
                        return hasProp(q, a(e, t, !1, !0).id)
                    },
                    specified: function(e) {
                        return e = a(e, t, !1, !0).id,
                        hasProp(q, e) || hasProp(E, e)
                    }
                }),
                t || (o.undef = function(e) {
                    d();
                    var n = a(e, t, !0),
                    r = getOwn(E, e);
                    i(e),
                    delete q[e],
                    delete T[n.url],
                    delete O[e],
                    eachReverse(S,
                    function(t, n) {
                        t[0] === e && S.splice(n, 1)
                    }),
                    r && (r.events.defined && (O[e] = r.events), l(e))
                }),
                o
            },
            enable: function(e) {
                var t = getOwn(E, e.id);
                t && s(e).enable()
            },
            completeLoad: function(e) {
                var t, n, i, o = getOwn(k.shim, e) || {},
                a = o.exports;
                for (d(); S.length;) {
                    if (n = S.shift(), null === n[0]) {
                        if (n[0] = e, t) break;
                        t = !0
                    } else n[0] === e && (t = !0);
                    h(n)
                }
                if (i = getOwn(E, e), !t && !hasProp(q, e) && i && !i.inited) {
                    if (! (!k.enforceDefine || a && getGlobal(a))) return r(e) ? void 0 : c(makeError("nodefine", "No define call for " + e, null, [e]));
                    h([e, o.deps || [], o.exportsFn])
                }
                p()
            },
            nameToUrl: function(e, t, n) {
                var i, r, o, a, s, u, c, d = getOwn(k.pkgs, e);
                if (d && (e = d), c = getOwn(M, e)) return x.nameToUrl(c, t, n);
                if (req.jsExtRegExp.test(e)) s = e + (t || "");
                else {
                    for (i = k.paths, r = e.split("/"), o = r.length; o > 0; o -= 1) if (a = r.slice(0, o).join("/"), u = getOwn(i, a)) {
                        isArray(u) && (u = u[0]),
                        r.splice(0, o, u);
                        break
                    }
                    s = r.join("/"),
                    s += t || (/^data\:|\?/.test(s) || n ? "": ".js"),
                    s = ("/" === s.charAt(0) || s.match(/^[\w\+\.\-]+:/) ? "": k.baseUrl) + s
                }
                return k.urlArgs ? s + (( - 1 === s.indexOf("?") ? "?": "&") + k.urlArgs) : s
            },
            load: function(e, t) {
                req.load(x, e, t)
            },
            execCb: function(e, t, n, i) {
                return t.apply(i, n)
            },
            onScriptLoad: function(e) {
                if ("load" === e.type || readyRegExp.test((e.currentTarget || e.srcElement).readyState)) {
                    interactiveScript = null;
                    var t = b(e);
                    x.completeLoad(t.id)
                }
            },
            onScriptError: function(e) {
                var t = b(e);
                return r(t.id) ? void 0 : c(makeError("scripterror", "Script error for: " + t.id, e, [t.id]))
            }
        },
        x.require = x.makeRequire(),
        x
    }
    function getInteractiveScript() {
        return interactiveScript && "interactive" === interactiveScript.readyState ? interactiveScript: (eachReverse(scripts(),
        function(e) {
            return "interactive" === e.readyState ? interactiveScript = e: void 0
        }), interactiveScript)
    }
    var req, s, head, baseElement, dataMain, src, interactiveScript, currentlyAddingScript, mainScript, subPath, version = "2.1.11",
    commentRegExp = /(\/\*([\s\S]*?)\*\/|([^:]|^)\/\/(.*)$)/gm,
    cjsRequireRegExp = /[^.]\s*require\s*\(\s*["']([^'"\s]+)["']\s*\)/g,
    jsSuffixRegExp = /\.js$/,
    currDirRegExp = /^\.\//,
    op = Object.prototype,
    ostring = op.toString,
    hasOwn = op.hasOwnProperty,
    ap = Array.prototype,
    apsp = ap.splice,
    isBrowser = !("undefined" == typeof window || "undefined" == typeof navigator || !window.document),
    isWebWorker = !isBrowser && "undefined" != typeof importScripts,
    readyRegExp = isBrowser && "PLAYSTATION 3" === navigator.platform ? /^complete$/: /^(complete|loaded)$/,
    defContextName = "_",
    isOpera = "undefined" != typeof opera && "[object Opera]" === opera.toString(),
    contexts = {},
    cfg = {},
    globalDefQueue = [],
    useInteractive = !1;
    if ("undefined" == typeof define) {
        if ("undefined" != typeof requirejs) {
            if (isFunction(requirejs)) return;
            cfg = requirejs,
            requirejs = void 0
        }
        "undefined" == typeof require || isFunction(require) || (cfg = require, require = void 0),
        req = requirejs = function(e, t, n, i) {
            var r, o, a = defContextName;
            return isArray(e) || "string" == typeof e || (o = e, isArray(t) ? (e = t, t = n, n = i) : e = []),
            o && o.context && (a = o.context),
            r = getOwn(contexts, a),
            r || (r = contexts[a] = req.s.newContext(a)),
            o && r.configure(o),
            r.require(e, t, n)
        },
        req.config = function(e) {
            return req(e)
        },
        req.nextTick = "undefined" != typeof setTimeout ?
        function(e) {
            setTimeout(e, 4)
        }: function(e) {
            e()
        },
        require || (require = req),
        req.version = version,
        req.jsExtRegExp = /^\/|:|\?|\.js$/,
        req.isBrowser = isBrowser,
        s = req.s = {
            contexts: contexts,
            newContext: newContext
        },
        req({}),
        each(["toUrl", "undef", "defined", "specified"],
        function(e) {
            req[e] = function() {
                var t = contexts[defContextName];
                return t.require[e].apply(t, arguments)
            }
        }),
        isBrowser && (head = s.head = document.getElementsByTagName("head")[0], baseElement = document.getElementsByTagName("base")[0], baseElement && (head = s.head = baseElement.parentNode)),
        req.onError = defaultOnError,
        req.createNode = function(e, t, n) {
            var i = e.xhtml ? document.createElementNS("http://www.w3.org/1999/xhtml", "html:script") : document.createElement("script");
            return i.type = e.scriptType || "text/javascript",
            i.charset = "utf-8",
            i.async = !0,
            i
        },
        req.load = function(e, t, n) {
            var i, r = e && e.config || {};
            if (isBrowser) return i = req.createNode(r, t, n),
            i.setAttribute("data-requirecontext", e.contextName),
            i.setAttribute("data-requiremodule", t),
            !i.attachEvent || i.attachEvent.toString && i.attachEvent.toString().indexOf("[native code") < 0 || isOpera ? (i.addEventListener("load", e.onScriptLoad, !1), i.addEventListener("error", e.onScriptError, !1)) : (useInteractive = !0, i.attachEvent("onreadystatechange", e.onScriptLoad)),
            i.src = n,
            currentlyAddingScript = i,
            baseElement ? head.insertBefore(i, baseElement) : head.appendChild(i),
            currentlyAddingScript = null,
            i;
            if (isWebWorker) try {
                importScripts(n),
                e.completeLoad(t)
            } catch(o) {
                e.onError(makeError("importscripts", "importScripts failed for " + t + " at " + n, o, [t]))
            }
        },
        isBrowser && !cfg.skipDataMain && eachReverse(scripts(),
        function(e) {
            return head || (head = e.parentNode),
            dataMain = e.getAttribute("data-main"),
            dataMain ? (mainScript = dataMain, cfg.baseUrl || (src = mainScript.split("/"), mainScript = src.pop(), subPath = src.length ? src.join("/") + "/": "./", cfg.baseUrl = subPath), mainScript = mainScript.replace(jsSuffixRegExp, ""), req.jsExtRegExp.test(mainScript) && (mainScript = dataMain), cfg.deps = cfg.deps ? cfg.deps.concat(mainScript) : [mainScript], !0) : void 0
        }),
        define = function(e, t, n) {
            var i, r;
            "string" != typeof e && (n = t, t = e, e = null),
            isArray(t) || (n = t, t = null),
            !t && isFunction(n) && (t = [], n.length && (n.toString().replace(commentRegExp, "").replace(cjsRequireRegExp,
            function(e, n) {
                t.push(n)
            }), t = (1 === n.length ? ["require"] : ["require", "exports", "module"]).concat(t))),
            useInteractive && (i = currentlyAddingScript || getInteractiveScript(), i && (e || (e = i.getAttribute("data-requiremodule")), r = contexts[i.getAttribute("data-requirecontext")])),
            (r ? r.defQueue: globalDefQueue).push([e, t, n])
        },
        define.amd = {
            jQuery: !0
        },
        req.exec = function(text) {
            return eval(text)
        },
        req(cfg)
    }
} (this),
function(e) {
    "use strict";
    var t = window;
    e.__old = t.glue,
    t.glue = e,
    t.__glue = e;
    var n = t.define;
    e.hasDefine = {},
    t.define = function(t) {
        e.hasDefine[t] = t,
        n.apply(null, arguments)
    },
    t.define.amd = {
        jQuery: !0
    };
    var i = Object.prototype.toString,
    r = function() {};
    "function" != typeof r.bind && (Function.prototype.bind = function(e) {
        if (arguments.length < 2 && void 0 === e) return this;
        var t = this,
        n = arguments;
        return function() {
            var i, r = [];
            for (i = 1; i < n.length; i++) r.push(n[i]);
            for (i = 0; i < arguments.length; i++) r.push(arguments[i]);
            return t.apply(e, r)
        }
    }),
    e.extend = function() {
        for (var e, t, n = arguments[0], i = [].slice.call(arguments, 1), r = 0, o = i.length; o > r; r++) {
            e = i[r];
            for (t in e) n[t] = e[t]
        }
        return n
    },
    e.extend(e, {
        version: "1.1.11",
        options: {
            comboServer: "http://localhost:9001/combo/",
            useComboServer: !1,
            prefix: "g-",
            attrPrefix: "g-attr-"
        },
        noConflict: function() {
            var t = e;
            return window.glue = e.__old,
            t
        },
        config: function(t) {
            if ("undefined" != typeof t && e.isObject(t)) for (var n in t) e.options[n] = t[n]
        },
        W3C: t.dispatchEvent,
        isDefined: function(e) {
            return "undefined" != typeof e
        },
        isString: function(e) {
            return "string" == typeof e
        },
        isNumber: function(e) {
            return "number" == typeof e
        },
        isDate: function(e) {
            return "[object Date]" === i.call(e)
        },
        isObject: function(e) {
            return null !== e && "object" == typeof e
        },
        isArray: function(e) {
            return "[object Array]" === i.call(e)
        },
        isFunction: function(e) {
            return "function" == typeof e
        },
        isWindow: function(e) {
            return e && e.document && e.location && e.alert && e.setInterval
        },
        error: function(e, t) {
            throw new(t = t || Error)(e)
        },
        isArrayLike: function(t) {
            if ("undefined" == typeof t || null === t || e.isWindow(t)) return ! 1;
            var n = t.length;
            return 1 === t.nodeType && n ? !0 : e.isString(t) || e.isArray(t) || 0 === n || "number" == typeof n && n > 0 && n - 1 in t
        },
        trim: function() {
            return String.prototype.trim ?
            function(t) {
                return e.isString(t) ? t.trim() : t
            }: function(t) {
                return e.isString(t) ? t.replace(/^\s\s*/, "").replace(/\s\s*$/, "") : t
            }
        } (),
        capitalize: function(e) {
            return e.replace(/(^|\s)([a-z|A-Z])(\w*)/g,
            function(e, t, n, i) {
                return t + n.toUpperCase() + i.toLowerCase()
            })
        },
        log: function() {
            "undefined" != typeof console && "function" == typeof console.log && console.log.apply(console, arguments)
        }
    })
} ({}),
window.glue = function(e) {
    function t() {}
    function n(e, t, n) {
        var i = !0;
        if (e) {
            var r = 0,
            o = e.length,
            a = t[0],
            s = t[1],
            u = t[2];
            switch (t.length) {
            case 0:
                for (; o > r; r += 2) i = e[r].call(e[r + 1] || n) !== !1 && i;
                break;
            case 1:
                for (; o > r; r += 2) i = e[r].call(e[r + 1] || n, a) !== !1 && i;
                break;
            case 2:
                for (; o > r; r += 2) i = e[r].call(e[r + 1] || n, a, s) !== !1 && i;
                break;
            case 3:
                for (; o > r; r += 2) i = e[r].call(e[r + 1] || n, a, s, u) !== !1 && i;
                break;
            default:
                for (; o > r; r += 2) i = e[r].apply(e[r + 1] || n, t) !== !1 && i
            }
        }
        return i
    }
    function i(e) {
        return "[object Function]" === Object.prototype.toString.call(e)
    }
    var r = /\s+/;
    t.prototype.on = function(e, t, n) {
        var i, o, a;
        if (!t) return this;
        for (i = this.__events || (this.__events = {}), e = e.split(r); o = e.shift();) a = i[o] || (i[o] = []),
        a.push(t, n);
        return this
    },
    t.prototype.once = function(e, t, n) {
        var i = this,
        r = function() {
            i.off(e, r),
            t.apply(this, arguments)
        };
        this.on(e, r, n)
    },
    t.prototype.off = function(e, t, n) {
        var i, a, s, u;
        if (! (i = this.__events)) return this;
        if (! (e || t || n)) return delete this.__events,
        this;
        for (e = e ? e.split(r) : o(i); a = e.shift();) if (s = i[a]) if (t || n) for (u = s.length - 2; u >= 0; u -= 2) t && s[u] !== t || n && s[u + 1] !== n || s.splice(u, 2);
        else delete i[a];
        return this
    },
    t.prototype.trigger = function(e) {
        var t, i, o, a, s, u, c = [],
        d = !0;
        if (! (t = this.__events)) return this;
        for (e = e.split(r), s = 1, u = arguments.length; u > s; s++) c[s - 1] = arguments[s];
        for (; i = e.shift();)(o = t.all) && (o = o.slice()),
        (a = t[i]) && (a = a.slice()),
        d = n(a, c, this) && d,
        d = n(o, [i].concat(c), this) && d;
        return d
    },
    t.prototype.emit = t.prototype.trigger,
    t.mixTo = function(e) {
        e = i(e) ? e.prototype: e;
        var n = t.prototype;
        for (var r in n) n.hasOwnProperty(r) && (e[r] = n[r])
    };
    var o = Object.keys;
    return o || (o = function(e) {
        var t = [];
        for (var n in e) e.hasOwnProperty(n) && t.push(n);
        return t
    }),
    e.Events = t,
    e
} (glue || {}),
window.glue = function(e) {
    function t(e) {
        return this instanceof t || !c(e) ? void 0 : i(e)
    }
    function n(e) {
        var n, i;
        for (n in e) i = e[n],
        t.Mutators.hasOwnProperty(n) ? t.Mutators[n].call(this, i) : this.prototype[n] = i
    }
    function i(e) {
        return e.extend = t.extend,
        e.implement = n,
        e
    }
    function r() {}
    function o(e, t, n) {
        for (var i in t) if (t.hasOwnProperty(i)) {
            if (n && -1 === d(n, i)) continue;
            "prototype" !== i && (e[i] = t[i])
        }
    }
    t.create = function(e, r) {
        function a() {
            e.apply(this, arguments),
            this.constructor === a && this.initialize && this.initialize.apply(this, arguments)
        }
        return c(e) || (r = e, e = null),
        r || (r = {}),
        e || (e = r.Extends || t),
        r.Extends = e,
        e !== t && o(a, e, e.StaticsWhiteList),
        n.call(a, r),
        i(a)
    },
    t.extend = function(e) {
        return e || (e = {}),
        e.Extends = this,
        t.create(e)
    },
    t.Mutators = {
        Extends: function(e) {
            var t = this.prototype,
            n = a(e.prototype);
            o(n, t),
            n.constructor = this,
            this.prototype = n,
            this.superclass = e.prototype
        },
        Implements: function(e) {
            u(e) || (e = [e]);
            for (var t, n = this.prototype; t = e.shift();) o(n, t.prototype || t)
        },
        Statics: function(e) {
            o(this, e)
        }
    };
    var a = Object.__proto__ ?
    function(e) {
        return {
            __proto__: e
        }
    }: function(e) {
        return r.prototype = e,
        new r
    },
    s = Object.prototype.toString,
    u = Array.isArray ||
    function(e) {
        return "[object Array]" === s.call(e)
    },
    c = function(e) {
        return "[object Function]" === s.call(e)
    },
    d = Array.prototype.indexOf ?
    function(e, t) {
        return e.indexOf(t)
    }: function(e, t) {
        for (var n = 0,
        i = e.length; i > n; n++) if (e[n] === t) return n;
        return - 1
    };
    return e.Class = t,
    e
} (glue || {}),
window.glue = function(e) {
    "use strict";
    var t = (window, document),
    n = {
        option: ["select"],
        tbody: ["table"],
        thead: ["table"],
        tfoot: ["table"],
        tr: ["table", "tbody"],
        td: ["table", "tbody", "tr"],
        th: ["table", "thead", "tr"],
        legend: ["fieldset"],
        caption: ["table"],
        colgroup: ["table"],
        col: ["table", "colgroup"],
        li: ["ul"]
    },
    i = /<\s*([\w\:]+)/,
    r = {},
    o = 0,
    a = "__ToDomId";
    for (var s in n) if (n.hasOwnProperty(s)) {
        var u = n[s];
        u.pre = "option" === s ? '<select multiple="multiple">': "<" + u.join("><") + ">",
        u.post = "</" + u.reverse().join("></") + ">"
    }
    var c = function(e, t) {
        t = t || t;
        var s = t[a];
        s || (t[a] = s = ++o + "", r[s] = t.createElement("div")),
        e += "";
        var u, c, d, l, f = e.match(i),
        p = f ? f[1].toLowerCase() : "",
        h = r[s];
        if (f && n[p]) for (u = n[p], h.innerHTML = u.pre + e + u.post, c = u.length; c; --c) h = h.firstChild;
        else h.innerHTML = e;
        if (1 === h.childNodes.length) return h.removeChild(h.firstChild);
        for (l = t.createDocumentFragment(); d = h.firstChild;) l.appendChild(d);
        return l
    },
    d = function(e) {
        return t.createTextNode(e)
    },
    l = function() {
        return t.createDocumentFragment()
    };
    return e.dom = {
        toDom: c,
        createDocumentFragment: l,
        createTextNode: d
    },
    e
} (glue || {}),
define("F_WidgetBase/utils", [],
function() {
    "use strict";
    var e = "{{",
    t = "}}",
    n = function(n) {
        for (var i, r, o, a = [], s = 0;;) {
            if (o = n.indexOf(e, s), -1 === o) break;
            if (i = n.slice(s, o), i && a.push({
                value: i,
                expr: !1
            }), s = o + e.length, o = n.indexOf(t, s), -1 === o) break;
            i = n.slice(s, o),
            i && (i = i.split("."), r = i.shift(), i = i.join("."), a.push({
                value: i,
                scope: r,
                expr: !0
            })),
            s = o + t.length
        }
        return i = n.slice(s),
        i && a.push({
            value: i,
            scope: "",
            expr: !1
        }),
        a
    },
    i = function(e, t) {
        for (var n, i = e,
        r = 0,
        o = t.length; o > r; r++) {
            if (n = t[r], !(n in e)) {
                var a = i.type + "组件中不存在" + t.join(".") + "属�?,请检�?";
                throw alert(a),
                new Error(a)
            }
            e = e[n]
        }
        return e
    };
    return {
        scanExpr: n,
        transContext: i
    }
}),
window.glue = function(e) {
    function t(e) {
        return Object.prototype.toString.call(e)
    }
    function n(e) {
        return "[object Object]" === t(e)
    }
    function i(e) {
        return "[object Function]" === t(e)
    }
    function r(e, t, n) {
        for (var i = 0,
        r = e.length; r > i && t.call(e, e[i], i) !== !1; i++);
    }
    function o(e) {
        if (!p.test(e)) return null;
        var t, n, i, r, o;
        if ( - 1 !== e.indexOf("trident/") && (t = /\btrident\/([0-9.]+)/.exec(e), t && t.length >= 2)) {
            i = t[1];
            var a = t[1].split(".");
            a[0] = parseInt(a[0], 10) + 4,
            o = a.join(".")
        }
        t = p.exec(e),
        r = t[1];
        var s = t[1].split(".");
        return "undefined" == typeof o && (o = r),
        s[0] = parseInt(s[0], 10) - 4,
        n = s.join("."),
        "undefined" == typeof i && (i = n),
        {
            browserVersion: o,
            browserMode: r,
            engineVersion: i,
            engineMode: n,
            compatible: i !== n
        }
    }
    function a(e) {
        if (c) try {
            var t = c.twGetRunPath.toLowerCase(),
            n = c.twGetSecurityID(f),
            i = c.twGetVersion(n);
            if (t && -1 === t.indexOf(e)) return ! 1;
            if (i) return {
                version: i
            }
        } catch(r) {}
    }
    function s(e, r, o) {
        var a = i(r) ? r.call(null, o) : r;
        if (!a) return null;
        var s = {
            name: e,
            version: l,
            codename: ""
        },
        u = t(a);
        if (a === !0) return s;
        if ("[object String]" === u) {
            if ( - 1 !== o.indexOf(a)) return s
        } else {
            if (n(a)) return a.hasOwnProperty("version") && (s.version = a.version),
            s;
            if (a.exec) {
                var c = a.exec(o);
                if (c) return c.length >= 2 && c[1] ? s.version = c[1].replace(/_/g, ".") : s.version = l,
                s
            }
        }
    }
    function u(e, t, n, i) {
        var o = v;
        r(t,
        function(t) {
            var n = s(t[0], t[1], e);
            return n ? (o = n, !1) : void 0
        }),
        n.call(i, o.name, o.version)
    }
    var c, d = {},
    l = "-1",
    f = this,
    p = /\b(?:msie |ie |trident\/[0-9].*rv[ :])([0-9.]+)/,
    h = [["nokia",
    function(e) {
        return - 1 !== e.indexOf("nokia ") ? /\bnokia ([0-9]+)?/: -1 !== e.indexOf("noain") ? /\bnoain ([a-z0-9]+)/: /\bnokia([a-z0-9]+)?/
    }], ["samsung",
    function(e) {
        return - 1 !== e.indexOf("samsung") ? /\bsamsung(?:\-gt)?[ \-]([a-z0-9\-]+)/: /\b(?:gt|sch)[ \-]([a-z0-9\-]+)/
    }], ["wp",
    function(e) {
        return - 1 !== e.indexOf("windows phone ") || -1 !== e.indexOf("xblwp") || -1 !== e.indexOf("zunewp") || -1 !== e.indexOf("windows ce")
    }], ["pc", "windows"], ["ipad", "ipad"], ["ipod", "ipod"], ["iphone", /\biphone\b|\biph(\d)/], ["mac", "macintosh"], ["mi", /\bmi[ \-]?([a-z0-9 ]+(?= build))/], ["aliyun", /\baliyunos\b(?:[\-](\d+))?/], ["meizu", /\b(?:meizu\/|m)([0-9]+)\b/], ["nexus", /\bnexus ([0-9s.]+)/], ["huawei",
    function(e) {
        var t = /\bmediapad (.+?)(?= build\/huaweimediapad\b)/;
        return - 1 !== e.indexOf("huawei-huawei") ? /\bhuawei\-huawei\-([a-z0-9\-]+)/: t.test(e) ? t: /\bhuawei[ _\-]?([a-z0-9]+)/
    }], ["lenovo",
    function(e) {
        return - 1 !== e.indexOf("lenovo-lenovo") ? /\blenovo\-lenovo[ \-]([a-z0-9]+)/: /\blenovo[ \-]?([a-z0-9]+)/
    }], ["zte",
    function(e) {
        return /\bzte\-[tu]/.test(e) ? /\bzte-[tu][ _\-]?([a-su-z0-9\+]+)/: /\bzte[ _\-]?([a-su-z0-9\+]+)/
    }], ["vivo", /\bvivo(?: ([a-z0-9]+))?/], ["htc",
    function(e) {
        return /\bhtc[a-z0-9 _\-]+(?= build\b)/.test(e) ? /\bhtc[ _\-]?([a-z0-9 ]+(?= build))/: /\bhtc[ _\-]?([a-z0-9 ]+)/
    }], ["oppo", /\boppo[_]([a-z0-9]+)/], ["konka", /\bkonka[_\-]([a-z0-9]+)/], ["sonyericsson", /\bmt([a-z0-9]+)/], ["coolpad", /\bcoolpad[_ ]?([a-z0-9]+)/], ["lg", /\blg[\-]([a-z0-9]+)/], ["android", /\bandroid\b|\badr\b/], ["blackberry", "blackberry"]],
    g = [["wp",
    function(e) {
        return - 1 !== e.indexOf("windows phone ") ? /\bwindows phone (?:os )?([0-9.]+)/: -1 !== e.indexOf("xblwp") ? /\bxblwp([0-9.]+)/: -1 !== e.indexOf("zunewp") ? /\bzunewp([0-9.]+)/: "windows phone"
    }], ["windows", /\bwindows nt ([0-9.]+)/], ["macosx", /\bmac os x ([0-9._]+)/], ["ios",
    function(e) {
        return /\bcpu(?: iphone)? os /.test(e) ? /\bcpu(?: iphone)? os ([0-9._]+)/: -1 !== e.indexOf("iph os ") ? /\biph os ([0-9_]+)/: /\bios\b/
    }], ["yunos", /\baliyunos ([0-9.]+)/], ["android",
    function(e) {
        return e.indexOf("android") >= 0 ? /\bandroid[ \/-]?([0-9.x]+)?/: e.indexOf("adr") >= 0 ? e.indexOf("mqqbrowser") >= 0 ? /\badr[ ]\(linux; u; ([0-9.]+)?/: /\badr(?:[ ]([0-9.]+))?/: "android"
    }], ["chromeos", /\bcros i686 ([0-9.]+)/], ["linux", "linux"], ["windowsce", /\bwindows ce(?: ([0-9.]+))?/], ["symbian", /\bsymbian(?:os)?\/([0-9.]+)/], ["blackberry", "blackberry"]],
    b = [["trident", p], ["webkit", /\bapplewebkit[\/]?([0-9.+]+)/], ["gecko", /\bgecko\/(\d+)/], ["presto", /\bpresto\/([0-9.]+)/], ["androidwebkit", /\bandroidwebkit\/([0-9.]+)/], ["coolpadwebkit", /\bcoolpadwebkit\/([0-9.]+)/], ["u2", /\bu2\/([0-9.]+)/], ["u3", /\bu3\/([0-9.]+)/]],
    m = [["sg", / se ([0-9.x]+)/], ["tw",
    function(e) {
        var t = a("theworld");
        return "undefined" != typeof t ? t: "theworld"
    }], ["360",
    function(e) {
        var t = a("360se");
        return "undefined" != typeof t ? t: -1 !== e.indexOf("360 aphone browser") ? /\b360 aphone browser \(([^\)]+)\)/: /\b360(?:se|ee|chrome|browser)\b/
    }], ["mx",
    function(e) {
        try {
            if (c && (c.mxVersion || c.max_version)) return {
                version: c.mxVersion || c.max_version
            }
        } catch(t) {}
        return /\bmaxthon(?:[ \/]([0-9.]+))?/
    }], ["qq", /\bm?qqbrowser\/([0-9.]+)/], ["green", "greenbrowser"], ["tt", /\btencenttraveler ([0-9.]+)/], ["lb",
    function(e) {
        if ( - 1 === e.indexOf("lbbrowser")) return ! 1;
        var t;
        try {
            c && c.LiebaoGetVersion && (t = c.LiebaoGetVersion())
        } catch(n) {}
        return {
            version: t || l
        }
    }], ["tao", /\btaobrowser\/([0-9.]+)/], ["fs", /\bcoolnovo\/([0-9.]+)/], ["sy", "saayaa"], ["baidu", /\bbidubrowser[ \/]([0-9.x]+)/], ["ie", p], ["mi", /\bmiuibrowser\/([0-9.]+)/], ["opera",
    function(e) {
        var t = /\bopera.+version\/([0-9.ab]+)/,
        n = /\bopr\/([0-9.]+)/;
        return t.test(e) ? t: n
    }], ["yandex", /yabrowser\/([0-9.]+)/], ["ali-ap",
    function(e) {
        return e.indexOf("aliapp") > 0 ? /\baliapp\(ap\/([0-9.]+)\)/: /\balipayclient\/([0-9.]+)\b/
    }], ["ali-ap-pd", /\baliapp\(ap-pd\/([0-9.]+)\)/], ["ali-am", /\baliapp\(am\/([0-9.]+)\)/], ["ali-tb", /\baliapp\(tb\/([0-9.]+)\)/], ["ali-tb-pd", /\baliapp\(tb-pd\/([0-9.]+)\)/], ["ali-tm", /\baliapp\(tm\/([0-9.]+)\)/], ["ali-tm-pd", /\baliapp\(tm-pd\/([0-9.]+)\)/], ["chrome", / (?:chrome|crios|crmo)\/([0-9.]+)/], ["uc",
    function(e) {
        return e.indexOf("ucbrowser/") >= 0 ? /\bucbrowser\/([0-9.]+)/: /\buc\/[0-9]/.test(e) ? /\buc\/([0-9.]+)/: e.indexOf("ucweb") >= 0 ? /\bucweb([0-9.]+)?/: /\b(?:ucbrowser|uc)\b/
    }], ["android",
    function(e) {
        return - 1 !== e.indexOf("android") ? /\bversion\/([0-9.]+(?: beta)?)/: void 0
    }], ["safari", /\bversion\/([0-9.]+(?: beta)?)(?: mobile(?:\/[a-z0-9]+)?)? safari\//], ["webview", /\bcpu(?: iphone)? os (?:[0-9._]+).+\bapplewebkit\b/], ["firefox", /\bfirefox\/([0-9.ab]+)/], ["nokia", /\bnokiabrowser\/([0-9.]+)/]],
    v = {
        name: "na",
        version: l
    },
    y = function(e) {
        e = (e || "").toLowerCase();
        var t = {};
        u(e, h,
        function(e, n) {
            var i = parseFloat(n);
            t.device = {
                name: e,
                version: i,
                fullVersion: n
            },
            t.device[e] = i
        },
        t),
        u(e, g,
        function(e, n) {
            var i = parseFloat(n);
            t.os = {
                name: e,
                version: i,
                fullVersion: n
            },
            t.os[e] = i
        },
        t);
        var n = o(e);
        return u(e, b,
        function(e, i) {
            var r = i;
            n && (i = n.engineVersion || n.engineMode, r = n.engineMode);
            var o = parseFloat(i);
            t.engine = {
                name: e,
                version: o,
                fullVersion: i,
                mode: parseFloat(r),
                fullMode: r,
                compatible: n ? n.compatible: !1
            },
            t.engine[e] = o
        },
        t),
        u(e, m,
        function(e, i) {
            var r = i;
            n && ("ie" === e && (i = n.browserVersion), r = n.browserMode);
            var o = parseFloat(i);
            t.browser = {
                name: e,
                version: o,
                fullVersion: i,
                mode: parseFloat(r),
                fullMode: r,
                compatible: n ? n.compatible: !1
            },
            t.browser[e] = o
        },
        t),
        t
    };
    if ("object" == typeof process && "[object process]" === process.toString()) {
        var x = module.require("./morerule"); [].unshift.apply(h, x.DEVICES || []),
        [].unshift.apply(g, x.OS || []),
        [].unshift.apply(m, x.BROWSER || []),
        [].unshift.apply(b, x.ENGINE || [])
    } else {
        var w = navigator.userAgent || "",
        _ = navigator.appVersion || "",
        k = navigator.vendor || "";
        c = f.external,
        d = y(w + " " + _ + " " + k)
    }
    d.parse = y;
    var E = {
        type: "pc"
    },
    C = navigator.userAgent,
    O = d.device.name,
    S = d.os.name,
    q = d.browser.name,
    T = "|pc|mac|na|",
    M = !!("ipad" === O || "android" === S && !C.match(/Mobile/) || "firefox" === q && C.match(/Tablet/)),
    D = !(M || !(T.indexOf("|" + O + "|") < 0) || "linux" === S);
    return M && (E.type = "pad"),
    D && (E.type = "mobile"),
    E.config = d,
    e.device = E,
    f.device = E,
    e
} (glue || {}),
window.glue = function(e) {
    "use strict";
    var t, n = window,
    i = Object.defineProperty;
    try {
        i({},
        "_", {
            value: "x"
        }),
        t = Object.defineProperties
    } catch(r) {
        i = function(e, t, n) {
            return "value" in n && (e[t] = n.value),
            "get" in n && e.__defineGetter__(t, n.get),
            "set" in n && e.__defineSetter__(t, n.set),
            e
        },
        t = function(e, t) {
            for (var n in t) t.hasOwnProperty(n) && i(e, n, t[n]);
            return e
        }
    }
    if (window.VBArray && window.execScript) {
        var o = new Date - 0;
        window.execScript(["Function parseVB(code)", "	ExecuteGlobal(code)", "End Function"].join("\n"), "VBScript");
        var a = function(e, t, n) {
            var i = e[t];
            return 3 !== arguments.length ? i() : void i(n)
        };
        t = function(e, t, n) {
            var i = "VBClass" + setTimeout("1"),
            r = [];
            r.push("Class " + i, "	Private [__data__], [__proxy__]", "	Public Default Function [__const__](d, p)", "		Set [__data__] = d: set [__proxy__] = p", "		Set [__const__] = Me", "	End Function");
            for (e in n) r.push("	Public [" + e + "]");
            r.push("	Public [hasOwnProperty]");
            for (e in t) e in n || r.push("	Public Property Let [" + e + "](val" + o + ")", '		Call [__proxy__]([__data__], "' + e + '", val' + o + ")", "	End Property", "	Public Property Set [" + e + "](val" + o + ")", '		Call [__proxy__]([__data__], "' + e + '", val' + o + ")", "	End Property", "	Public Property Get [" + e + "]", "	On Error Resume Next", "		Set[" + e + '] = [__proxy__]([__data__],"' + e + '")', "	If Err.Number <> 0 Then", "		[" + e + '] = [__proxy__]([__data__],"' + e + '")', "	End If", "	On Error Goto 0", "	End Property");
            return r.push("End Class"),
            r.push("Function " + i + "Factory(a, b)", "	Dim o", "	Set o = (New " + i + ")(a, b)", "	Set " + i + "Factory = o", "End Function"),
            window.parseVB(r.join("\r\n")),
            window[i + "Factory"](t, a)
        }
    }
    var s = function(t) {
        e.isFunction(t) || e.error("modelFn必须是个方法或数组！");
        var n = {};
        return t(n),
        u(n)
    },
    u = function(i) {
        if (e.isArray(i)) return new c(i);
        for (var r in i)(e.isObject(i[r]) || e.isArray(i[r])) && (i[r] = u(i[r]));
        i.$events = {},
        i.$watch = function() {},
        i.$unWatch = function() {},
        i.$orgModel = {};
        var o = {},
        a = {},
        s = {},
        d = {};
        for (var l in i)"$" === l.substring(0, 1) || e.isFunction(i[l]) ? o[l] = i[l] : (d[l] = i[l], a[l] = function(t) {
            return function() {
                var n, i, r, o, a, u = s.vmodel;
                if (! (arguments.length > 0)) return u.$orgModel[t];
                var c = arguments[0],
                d = u.$orgModel[t];
                if (c !== d) {
                    if (e.isArray(d)) i = u[t],
                    i.clear(),
                    i.push.apply(i, c);
                    else {
                        if (!e.isObject(d)) {
                            if (u.$orgModel[t] = c, a = u.$events[t], "undefined" != typeof a) for (r = 0; r < a.length; r++) o = a[r].callback,
                            o.call(a[r].context, c);
                            return
                        }
                        i = u[t];
                        for (n in c)"$" === n.substring(0, 1) || "__const__" === n || "__data__" === n || "__proxy__" === n || "hasOwnProperty" === n || e.isFunction(c[n]) || (i[n] = c[n]);
                        for (a = u.$events[t] || [], r = 0; r < a.length; r++) o = a[r].callback,
                        o.call(a[r].context, c)
                    }
                    if (c.$watch && u.$orgModel[t].$watch) {
                        a = u.$orgModel[t].$events;
                        for (n in a) c.$watch(n, a[n].callback, a[n].context);
                        u.$orgModel[t] = c
                    }
                }
            }
        } (l));
        var f = n.VBArray && n.execScript ?
        function(e) {
            return e
        }: function(e) {
            var t = {};
            for (var n in e) t[n] = {
                get: e[n],
                set: e[n]
            };
            return t
        },
        p = t(i, f(a), o);
        s.vmodel = p,
        p.$events = {},
        p.$watch = function() {},
        p.$unWatch = function() {},
        p.$orgModel = d;
        var h = function(e, t, n) {
            "undefined" == typeof this.$events[e] && (this.$events[e] = []),
            this.$events[e].push({
                callback: t,
                context: n || this
            })
        },
        g = function(t, n, i) {
            t = t || "*",
            n = n || "*",
            i = i || "*";
            var r, o, a, s;
            if (e.isArray(this) || e.isObject(this)) for (s in this)"$" === s.substring(0, 1) || "__const__" === s || "__data__" === s || "__proxy__" === s || "hasOwnProperty" === s || e.isFunction(this[s]) || g.bind(this[s])(t, n, i);
            for (var u in this.$events) if (u === t || "*" === t) {
                for (r = this.$events[u], a = r.length - 1; a >= 0; a--) o = r[a],
                o.callback !== n && "*" !== n || o.context !== i && "*" !== i || r.splice(a, 1);
                0 === r.length && delete this.$events[u]
            }
        };
        return p.$unWatch = g.bind(p),
        p.$watch = h.bind(p),
        p
    },
    c = function(e) {
        return e.$events = {},
        e.$unWatch = function(e, t, n) {
            e = e || "*",
            t = t || "*",
            n = n || "*";
            var i, r, o;
            for (var a in this.$events) if (a === e || "*" === e) {
                for (i = this.$events[a], o = i.length - 1; o >= 0; o--) r = i[o],
                r.callback !== t && "*" !== t || r.context !== n && "*" !== n || i.splice(o, 1);
                0 === i.length && delete this.$events[a]
            }
        },
        e.$watch = function(e, t, n) {
            "undefined" == typeof this.$events[e] && (this.$events[e] = []),
            this.$events[e].push({
                callback: t,
                context: n || this
            })
        },
        e.push = function() {
            var e = Array.prototype.push.apply(this, arguments),
            t = [].slice.call(arguments);
            return this.$fire("push", t),
            e
        },
        e.pop = function() {
            var e = Array.prototype.pop.apply(this, arguments);
            return this.$fire("pop", e),
            e
        },
        e.unshift = function() {
            var e = Array.prototype.unshift.apply(this, arguments),
            t = [].slice.call(arguments);
            return this.$fire("unshift", t),
            e
        },
        e.shift = function() {
            var e = Array.prototype.shift.apply(this, arguments);
            return this.$fire("shift", e),
            e
        },
        e.clear = function() {
            return this.length = 0,
            this.$fire("clear"),
            this
        },
        e.unshift = function() {
            var e = Array.prototype.unshift.apply(this, arguments),
            t = [].slice.call(arguments);
            return this.$fire("unshift", t),
            e
        },
        e.$fire = function(e) {
            var t, n = [].slice.call(arguments),
            i = this.$events[e];
            if ("undefined" != typeof i) for (var r = 0; r < i.length; r++) t = i[r],
            n.length > 1 ? t.callback.call(t.context, n[1]) : t.callback.call(t.context, n[1])
        },
        e
    },
    d = {
        define: s,
        defineArray: c
    };
    return e.modelFactory = d,
    e
} (glue || {}),
window.glue = function(e) {
    "use strict";
    var t = {},
    n = {},
    i = 0;
    return e.extend(e, {
        createWidgetUuid: function() {
            return i++,
            "__glue_widget_" + i
        },
        addWidget: function(n) {
            "undefined" == typeof n.uuid && (n.uuid = e.createWidgetUuid()),
            t[n.uuid] = n
        },
        removeWidget: function(e) {
            "string" != typeof e && (e = e.uuid);
            var n = t[e];
            delete t[e],
            n.destroy()
        },
        getWidget: function(e) {
            return "string" != typeof e && (e = e.uuid),
            t[e]
        },
        getAllWidget: function() {
            return t
        },
        checkUuid: function(t) {
            if (n[t] === !0) {
                var i = "组件的Uuid冲突，请检查你设置的uuid值是否重复，冲突uuid: " + t;
                return e.log(i),
                !1
            }
            return ! 0
        },
        regUuid: function(e) {
            n[e] = !0
        }
    }),
    e
} (glue || {}),
window.glue = function(e) {
    "use strict";
    var t = window,
    n = {},
    i = new e.Events,
    r = /\s+/;
    return e.extend(e, {
        observer: function(e, n, o) {
            o = o || t;
            var a, s = e.split(r);
            i.on(e, n, o);
            for (var u = 0,
            c = s.length; c > u; u++) a = this.getMessage(s[u]),
            a.length > 0 && n.apply(o, a[a.length - 1])
        },
        unObserver: function(e, t, n) {
            i.off(e, t, n)
        },
        notify: function(e) {
            for (var t = e.split(r), n = [].slice.call(arguments, 1), o = 0, a = t.length; a > o; o++) this.addMessage(t[o], n);
            i.trigger.apply(i, arguments)
        },
        getObserver: function(e) {
            return "undefined" == typeof e ? i: i.__events[e] || []
        },
        addMessage: function(e, t) {
            "undefined" == typeof n[e] && (n[e] = []),
            n[e].push(t)
        },
        getMessage: function(e) {
            return "undefined" == typeof e ? n: n[e] || []
        }
    }),
    e
} (glue || {}),
window.glue = function(e) {
    "use strict";
    document,
    window;
    return e.extend(e, {
        regWidgetList: {},
        regWidgetPriorityList: {},
        regWidgetUnComboNames: {},
        regWidgetAllNames: {},
        regWidgetComboedNames: {},
        depWidgetList: {},
        widgetRegist: function(t, n, i, r, o, a, s) { ("undefined" == typeof o || null === o) && (o = 1),
            e.regWidgetAllNames[i] = i,
            "undefined" == typeof e.regWidgetComboedNames[i] && "undefined" == typeof e.hasDefine[i] && (e.regWidgetUnComboNames[i] = i);
            var u = {
                id: n,
                priority: o,
                nexts: [],
                instance: null,
                depId: r,
                cname: i,
                regTime: (new Date).valueOf(),
                startTime: "",
                createTime: "",
                start: function() {
                    u.startTime = (new Date).valueOf(),
                    s = s || e;
                    try {
                        require([i],
                        function(e) {
                            var i = new e(s, n);
                            i.create(t, a),
                            u.instance = i,
                            u.createTime = (new Date).valueOf()
                        })
                    } catch(r) {
                        e.log("require ：cname " + r)
                    }
                }
            };
            "undefined" != typeof r && null !== r ? ("undefined" == typeof e.depWidgetList[r] && (e.depWidgetList[r] = []), e.depWidgetList[r].push(u)) : ("undefined" == typeof e.regWidgetPriorityList[o] && (e.regWidgetPriorityList[o] = []), e.regWidgetPriorityList[o].push(u)),
            e.regWidgetList[n] = u
        }
    }),
    e
} (glue || {}),
window.glue = function(e) {
    "use strict";
    var t = document,
    n = t.documentElement;
    e.extend(e, {
        scan: function(e) {
            e = e || n,
            i(e)
        }
    });
    var i = function(t) {
        var n = e.options,
        r = t.getAttribute(n.prefix + "cid"),
        o = t.getAttribute(n.prefix + "cname"),
        a = t.getAttribute(n.prefix + "priority"),
        s = t.getAttribute(n.prefix + "depId"),
        u = t.getAttribute(n.prefix + "isRegister");
        if (e.isString(r) && e.isString(o) && "registered" !== u) return t.setAttribute("g-isRegister", "registered"),
        void e.widgetRegist(t, r, o, s, a);
        for (var c = t.firstChild; c;) {
            var d = c.nextSibling;
            1 === c.nodeType && i(c),
            c = d
        }
    };
    return e
} (glue || {}),
window.glue = function(e) {
    "use strict";
    var t = document,
    n = null,
    i = [];
    e.extend(e, {
        comboQuestList: [],
        isComboing: !1,
        isRunRegWidgets: !1,
        run: function() {
            r(),
            u(),
            e.options.useComboServer ? a(function() {
                c()
            }) : c()
        },
        notifyDepExce: function(t) {
            var n = e.regWidgetList[t.uuid];
            if ("undefined" != typeof n) {
                var i = n.priority,
                r = e.regWidgetPriorityList[i],
                o = n.nexts;
                r.push.apply(r, o),
                n.nexts = [],
                o.length > 0 && e.isRunRegWidgets === !1 && c()
            }
        }
    });
    var r = function() {
        var t;
        for (var n in e.depWidgetList) t = e.regWidgetList[n],
        "undefined" != typeof e.regWidgetList[n] && (t.nexts = t.nexts.concat(e.depWidgetList[n]), e.depWidgetList[n] = [], t.instance && t.instance.isDependWidgetRun === !0 && e.notifyDepExce(t.instance))
    },
    o = function(e) {
        return e.join(",")
    },
    a = function(n) {
        if (e.isComboing === !0) return void e.comboQuestList.push(n);
        e.isComboing = !0;
        var i = [],
        r = [],
        a = e.options,
        u = t.head || t.getElementsByTagName("head")[0];
        for (var c in e.regWidgetComboedNames) r.push(c);
        for (var d in e.regWidgetUnComboNames) i.push(d),
        e.regWidgetComboedNames[d] = d;
        if (e.regWidgetUnComboNames = {},
        0 === i.length) return n && n(),
        void s();
        i.sort(),
        r.sort();
        var l = a.comboServer + "?c=" + encodeURIComponent(o(i)) + "&f=" + encodeURIComponent(o(r)),
        f = e.debug.debugConfigGet();
        l += f.isCompress === !1 ? "&isCompress=false": "&isCompress=true",
        l = l + "&device=" + e.device.type;
        var p = t.createElement("script");
        p[e.W3C ? "onload": "onreadystatechange"] = function() { (e.W3C || /loaded|complete/i.test(p.readyState)) && (e.isComboing = !1, n && n(), s())
        },
        p.onerror = function() {
            alert("装载失败�?")
        },
        p.src = l,
        u.insertBefore(p, u.firstChild)
    },
    s = function() {
        var t;
        e.comboQuestList.length > 0 && (t = e.comboQuestList.shift(), a(t))
    },
    u = function() {
        i = [];
        for (var t in e.regWidgetPriorityList) i.push(t);
        i.sort(function(e, t) {
            return t - e
        })
    },
    c = function() {
        clearTimeout(n),
        n = setTimeout(function() {
            var t, n, r, o, a = !1;
            for (r = 0, o = i.length; o > r; r++) if (t = e.regWidgetPriorityList[i[r]], t.length > 0) {
                n = t.shift(),
                n.start(),
                a = !0;
                break
            }
            a ? (e.isRunRegWidgets = !0, c()) : e.isRunRegWidgets = !1
        },
        50)
    };
    return e
} (glue || {}),
window.glue = function(e) {
    "use strict";
    var t = window;
    e.extend(e, {
        resolveObject: function(e, t, i) {
            var r = n(e, t);
            i(r)
        }
    });
    var n = function(i, r, o) {
        var a = r.split("."),
        s = a.shift();
        return e.isDefined(i) && null !== i ? (o = i, i = i[s]) : i = t[s],
        0 === a.length ? o && o.$watch ? {
            value: i,
            $watch: function(e, t) {
                return function(n) {
                    t.$watch(e, n)
                }
            } (s, o),
            $set: function(e, t) {
                return function(n) {
                    t[e] = n
                }
            } (s, o)
        }: {
            value: i
        }: n(i, a.join("."), i)
    };
    return e
} (glue || {}),
define("F_glue", [],
function() {
    return __glue
}),
window.glue = function(glue) {
    "use strict";
    var win = window,
    doc = document,
    getDom = function(e) {
        return doc.getElementById(e)
    },
    addEventListener = function() {
        return win.addEventListener ?
        function(e, t, n) {
            e.addEventListener(t, n, !1)
        }: function(e, t, n) {
            e.attachEvent("on" + t, n)
        }
    } (),
    formatTime = function(e) {
        if ("" === e) return "---";
        var t = new Date(e);
        return t.getMinutes() + ":" + t.getSeconds() + ":" + t.getMilliseconds()
    },
    getEndTime = function() {
        var e, t = 0;
        for (var n in glue.regWidgetList) e = glue.regWidgetList[n].createTime,
        e > t && (t = e);
        return t
    },
    getBeginTime = function() {
        var e, t = (new Date).valueOf();
        for (var n in glue.regWidgetList) e = glue.regWidgetList[n].startTime || t,
        t > e && (t = e);
        return t
    },
    sortList = function() {
        var e = [];
        for (var t in glue.regWidgetList) e.push(glue.regWidgetList[t]);
        return e.sort(function(e, t) {
            var n = (new Date).valueOf(),
            i = e.startTime || n,
            r = t.startTime || n;
            return i - r
        }),
        e
    },
    simpleStringToJson = function(sValue) {
        if ("" === sValue) return "";
        try {
            return eval("1," + sValue)
        } catch(e) {
            alert(sValue + " 无法转换成Json，请重新输入内容")
        }
    },
    simpleJsonToString = function(e) {
        if ("undefined" == typeof e) return "";
        var t, n = [];
        for (var i in e) t = e[i],
        "string" == typeof t && (t = '"' + t.replace(/["]/gi, "\\windflowers").replace(/windflowers/gi, '"') + '"'),
        n.push('"' + i + '": ' + t);
        return "{" + n.join(",") + "}"
    },
    simpleJsonToArrayString = function(e) {
        if ("undefined" == typeof e) return "";
        var t = [];
        for (var n in e) t.push('"' + n + '"');
        return "[" + t.join(",") + "]"
    },
    extendRequireConfig = function(e, t) {
        var n = simpleStringToJson(t),
        i = win.requirejs.config;
        win.requirejs.config = function(t) {
            var r, o = t.paths;
            if ("undefined" != typeof o) for (var a in o) r = o[a],
            "undefined" != typeof n[r] ? t.paths[a] = n[r] : e === !1 && (t.paths[a] = r.replace(/\.min/, ""));
            i.call(win.requirejs, t)
        }
    },
    createComboLink = function(e, t) {
        var n = t || "http://localhost:9001/";
        e = simpleStringToJson(e),
        e = e || [],
        n = n + "combo?c=" + encodeURIComponent(e.join(",")) + "&isDebug=true&device=" + glue.device.type,
        document.write("<script src=" + n + "></script>")
    },
    getCookie = function(e) {
        var t, n, i = e + "=",
        r = doc.cookie,
        o = r.indexOf(i);
        return o > -1 ? (t = r.indexOf(";", o), n = -1 === t ? r.substring(o + i.length) : r.substring(o + i.length, t), n = decodeURIComponent(n)) : n = "",
        n
    },
    setCookie = function(e, t) {
        doc.cookie = e + "=" + encodeURIComponent(t) + ";expires=" + new Date((new Date).valueOf() + 864e6).toUTCString()
    },
    clearCookie = function(e) {
        doc.cookie = e + "=null;expires=" + new Date((new Date).valueOf() - 6e5).toUTCString()
    },
    debug = {
        init: function() {
            var e = win.location.href.indexOf("f_debug=true") > -1,
            t = this.debugConfigGet();
            e && addEventListener(win, "load",
            function() {
                debug.creatDebugConsole(t)
            }),
            "" != typeof t && ((t.isCompress === !1 || "undefined" != typeof t.pathMaps && "" !== t.pathMaps) && extendRequireConfig(t.isCompress, t.pathMaps), t.isLocal === !0 && createComboLink(t.compMaps, t.localUrl))
        },
        debugConfigGet: function() {
            return simpleStringToJson(getCookie("f_debug"))
        },
        debugConfigSet: function(e, t, n, i, r) {
            var o = {
                isLocal: e,
                isCompress: t,
                localUrl: n || "",
                pathMaps: i || "",
                compMaps: r || ""
            },
            a = simpleJsonToString(o);
            setCookie("f_debug", a)
        },
        debugConfigClear: function() {
            clearCookie("f_debug")
        },
        creatDebugConsole: function(e) {
            var t = doc.createElement("div");
            t.id = "fDebugBox";
            var n = '<div style="position: fixed; _position: absolute; right: 5px; font-size: 12px; bottom: 5px; background: #CCC; z-index=2147483647"><div id="f_debugBoxIn" style="display: none; padding: 5px; border: 1px solid #999; background: #CCC;"><div style="margin-bottom: 5px;"><label style="margin-right: 100px;">本地调试�?<input type="checkbox" id="f_debug_isLocal" /></label><label>取消压缩�?<input type="checkbox" id="f_debug_isCompress" /></label></div><div style="margin-bottom: 5px;"><label>服务地址�?<input type="text" id="f_debug_localUrl" style="width: 304px; border: 1px solid #999; background: #FFF;" value="http://localhost:9001/" /></label></div><div style="overflow: hidden; *zoom: 1;"><div style="float: left;">组件映射�?</div><textarea id="f_debug_compMaps" style="width: 300px; height: 50px; border: 1px solid #999; background: #FFF;"></textarea></div><div style="overflow: hidden; *zoom:1; margin-bottom: 5px;"><div style="float: left">路径映射�?</div><textarea id="f_debug_pathMaps" style="width: 300px; height: 50px; border: 1px solid #999; background: #FFF;"></textarea></div><div style="text-align: right;"><button id="f_debug_bt1" type="button">开启调�?</button><button id="f_debug_bt2" type="button">关闭调试</button><button id="f_debug_bt3" type="button">获取组件映射</button><button id="f_debug_bt4" type="button">注册列表</button><button id="f_debug_bt5" type="button">时间�?</button></div></div><div id="f_debugBoxShowHide" data-toggle="hide" style = "border: 1px solid #999; background: #FFC; padding: 5px; cursor: pointer; text-align: right; border-top: 1px solid #CCC;">显示调试</div></div>';
            t.innerHTML = n,
            doc.body.appendChild(t);
            var i = getDom("f_debugBoxShowHide"),
            r = getDom("f_debugBoxIn"),
            o = getDom("f_debug_bt1"),
            a = getDom("f_debug_bt2"),
            s = getDom("f_debug_bt3"),
            u = getDom("f_debug_bt4"),
            c = getDom("f_debug_bt5"),
            d = getDom("f_debug_isLocal"),
            l = getDom("f_debug_isCompress"),
            f = getDom("f_debug_localUrl"),
            p = getDom("f_debug_pathMaps"),
            h = getDom("f_debug_compMaps");
            "" !== e && (d.checked = e.isLocal, l.checked = !e.isCompress, f.value = e.localUrl, p.value = e.pathMaps, h.value = e.compMaps),
            i.onclick = function() {
                "hide" === this.getAttribute("data-toggle") ? (r.style.display = "", this.setAttribute("data-toggle", "show"), this.innerHTML = "隐藏调试") : (r.style.display = "none", this.setAttribute("data-toggle", "hide"), this.innerHTML = "显示调试")
            },
            o.onclick = function() {
                debug.debugConfigSet(d.checked, !l.checked, f.value, p.value, h.value),
                alert("调试配置保存成功，请刷新页面查看效果")
            },
            a.onclick = function() {
                debug.debugConfigClear(),
                d.checked = !1,
                l.checked = !1,
                f.value = "",
                p.value = "",
                h.value = "",
                alert("调试设置已清除，请刷新页面查看效�?")
            },
            s.onclick = function() {
                h.value = simpleJsonToArrayString(glue.regWidgetAllNames)
            },
            u.onclick = function() {
                debug.drawViewList()
            },
            c.onclick = function() {
                debug.drawTimeLine()
            }
        },
        drawViewList: function() {
            var e, t = glue.regWidgetList,
            n = doc.createElement("div");
            n.setAttribute("style", "position: fixed; _position: absolute; background: #FFF; z-index:2147483647; bottom: 5px; right: 5px;"),
            n.setAttribute("id", "taskerViewList");
            var i = '<table cellspacing="0" cellpadding="3" border="1">';
            i += "<thead><tr><th>组件�?</th><th>组件类型</th><th>优先�?</th><th>注册时间</th><th>初始化时�?</th><th>完成时间</th></tr>";
            for (var r in t) e = t[r],
            i += "<tr>",
            i += '<td style="width: 200px;">' + e.id + "</td>",
            i += '<td style="width: 200px;">' + e.cname + "</td>",
            i += "<td>" + e.priority + "</td>",
            i += "<td>" + formatTime(e.regTime) + "</td>",
            i += "<td>" + formatTime(e.startTime) + "</td>",
            i += "<td>" + formatTime(e.createTime) + "</td>",
            i += "</tr>";
            i += "</table>",
            i += "<button onclick=\"document.body.removeChild(document.getElementById('taskerViewList'))\">关闭</button>",
            doc.body.appendChild(n),
            n.innerHTML = i
        },
        drawTimeLine: function() {
            var e, t, n = sortList(),
            i = getBeginTime(),
            r = getEndTime(),
            o = r - i,
            a = o > 0 ? 600 / o: 0,
            s = document.createElement("div");
            s.setAttribute("style", "position: fixed; _position: absolute; background: #FFF; z-index:2147483647; bottom: 5px; right: 5px;"),
            s.setAttribute("id", "taskerTimeLine");
            var u = '<table cellspacing="0" cellpadding="3" border="1">';
            u += "<thead><tr><th>组件�?</th><th>优先�?</th><th>注册时间</th><th>时间�?</th></tr>";
            for (var c, d, l, f, p = 0,
            h = n.length; h > p; p++) e = n[p],
            "" !== e.startTime ? (c = e.startTime - i, d = a * c) : (d = 0, c = 0),
            "" !== e.createTime ? (l = e.createTime - e.startTime, f = a * l, f = 1 > f ? 1 : f) : (f = 0, l = 0),
            t = e.id,
            u += "<tr>",
            u += "<td>" + t + "</td>",
            u += "<td>" + e.priority + "</td>",
            u += "<td>" + formatTime(e.regTime) + "</td>",
            u += "<td>",
            u += '<div style="display: inline-block; height: 10px; background: #CCC; width: ' + d + 'px" title="' + c + '"></div>',
            u += '<div style="display: inline-block; height: 10px; background: #C60; width: ' + f + 'px" title="' + l + '"></div>',
            u += "</td>",
            u += "</tr>";
            u += "</table>",
            u += "<button onclick=\"document.body.removeChild(document.getElementById('taskerTimeLine'))\">关闭</button>",
            document.body.appendChild(s),
            s.innerHTML = u
        }
    };
    return glue.extend(glue, {
        debug: debug
    }),
    glue.debug.init(),
    glue
} (glue || {}),
define("F_WidgetBase", ["F_glue", "F_WidgetBase/utils"],
function(e, t) {
    "use strict";
    var n = window,
    i = document,
    r = function() {},
    o = e.Class.create({
        initialize: function(t, n) {
            if ("undefined" == typeof t || !(t instanceof o || t === e)) {
                var i = "请设置组件的父组件，如果没有被其他组件包含，则将parent设置为glue";
                throw alert(i),
                new Error(i)
            }
            this.isCreate = !1,
            this.isDependWidgetRun = !1,
            this.uuid = n || e.createWidgetUuid(),
            e.checkUuid(this.uuid) && (e.regUuid(this.uuid), this.parent = t, this.parent.addWidget(this), this.widgets = {})
        },
        create: function(e, t) {
            return this.isCreate ? void 0 : (this.container = e || null, this.ownerNode = null, this.createModel(), this.mixElementProperties(), this.mixProperties(t), this.resolveTemplate(), this.resolveVariables(), this.bindDomEvent(), this.bindDataEvent(), this.bindCustomEvent(), this.bindObserver(), this.renderer(), this.createComplete(), this.isCreate = !0, this)
        },
        createModel: r,
        mixElementProperties: function() {
            var e = this.container;
            if ("string" == typeof e && (e = i.getElementById(e)), e && (1 !== e.nodeType && (e = e[0]), "undefined" != typeof e && 1 === e.nodeType)) {
                var t = e.getAttribute("g-options");
                if (t) {
                    var n = new Function("return " + t)();
                    this.mixProperties(n)
                }
            }
        },
        mixProperties: function(n) {
            var i, r, o;
            if (e.isDefined(n)) for (var a in n) {
                var s = n[a];
                "string" == typeof s && /^[@]{2,2}/.test(s) ? this.mixModel(a, s) : (i = a.split("."), r = i.pop(), o = t.transContext(this, i), o[r] = s)
            }
        },
        mixModel: function(t, i) {
            i = i.substring(2);
            var r = i.split("."),
            o = n[r.shift()],
            a = r.join("."),
            s = this,
            u = "|__const__|__data__|__proxy__|hasOwnProperty|";
            if ("" === a) for (a in o)"undefined" != typeof a && !/^[$]/.test(a) && u.indexOf("|" + a + "|") < 0 && e.resolveObject(o, a,
            function(e) {
                return function(t) {
                    s.bibind(e, t)
                }
            } (t + "." + a));
            else e.resolveObject(o, a,
            function(e) {
                return function(t) {
                    s.bibind(e, t)
                }
            } (t))
        },
        bibind: function(n, i) {
            var r = n.split(".");
            n = r.pop();
            var o = t.transContext(this, r);
            o[n] = i.value,
            e.isFunction(i.$watch) && (i.$watch(function(e) {
                return function(t) {
                    o[e] = "undefined" == typeof t ? "": t
                }
            } (n)), o.$watch && o.$watch(n,
            function(e) {
                return function(t) {
                    e.$set(t)
                }
            } (i)))
        },
        resolveTemplate: r,
        resolveVariables: function() {
            if (this.ownerNode) {
                var n = this,
                i = function(r) {
                    if (3 === r.nodeType) {
                        for (var o = r.nodeValue,
                        a = t.scanExpr(o), s = e.dom.createDocumentFragment(), u = 0; u < a.length; u++) {
                            var c = a[u],
                            d = e.dom.createTextNode(c.value);
                            c.expr && e.resolveObject(n[c.scope], c.value,
                            function(t) {
                                d.nodeValue = t.value,
                                e.isFunction(t.$watch) && !
                                function(e) {
                                    t.$watch(function(t) {
                                        e.nodeValue = "undefined" == typeof t ? "": t
                                    })
                                } (d)
                            }),
                            s.appendChild(d)
                        }
                        return void r.parentNode.replaceChild(s, r)
                    }
                    for (var l = r.firstChild; l;) {
                        var f = l.nextSibling;
                        i(l),
                        l = f
                    }
                };
                i(this.ownerNode)
            }
        },
        bindDataEvent: r,
        bindDomEvent: r,
        bindCustomEvent: r,
        bindObserver: r,
        renderer: r,
        createComplete: r,
        watch: function(e, t, n) {
            e && e.$watch && e.$watch(t, n, this)
        },
        unWatch: function(e, t, n) {
            e && e.$unWatch && e.$unWatch(t, n, this)
        },
        addWidget: function(e) {
            this.widgets[e.uuid] = e
        },
        removeWidget: function(e) {
            "string" != typeof e && (e = e.uuid);
            var t = this.widget[e];
            "undefined" != typeof t && (delete this.widgets[e], t.destroy())
        },
        getWidget: function(e) {
            return "string" != typeof e && (e = e.uuid),
            this.widget[e]
        },
        getAllWidget: function() {
            return this.widgets
        },
        notify: function() {
            var t = [].slice.call(arguments, 0);
            t.push(this.uuid, this.type),
            "undefined" != typeof e && e.notify.apply(e, t)
        },
        observer: function(t, n) {
            "undefined" != typeof e && e.observer.call(e, t, n, this)
        },
        unObserver: function(t, n) {
            "undefined" != typeof e && e.unObserver.call(e, t, n, this)
        },
        destroy: function() {
            for (var e in this.widgets) this.widgets[e].destroy()
        },
        runDependWidget: function() {
            this.isDependWidgetRun === !1 && (e.notifyDepExce(this), this.isDependWidgetRun = !0)
        }
    });
    return e.Events.mixTo(o),
    o.version = "1.1.11@",
    o.type = "widgetBase",
    o
});