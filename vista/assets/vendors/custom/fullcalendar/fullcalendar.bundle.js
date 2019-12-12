!function(t, e) {
    "object" == typeof exports && "object" == typeof module ? module.exports = e(require("moment"), require("jquery")) : "function" == typeof define && define.amd ? define(["moment", "jquery"], e) : "object" == typeof exports ? exports.FullCalendar = e(require("moment"), require("jquery")) : t.FullCalendar = e(t.moment, t.jQuery)
}("undefined" != typeof self ? self : this, function(n, r) {
    return function(n) {
        var r = {};
        function i(t) {
            if (r[t])
                return r[t].exports;
            var e = r[t] = {
                i: t,
                l: !1,
                exports: {}
            };
            return n[t].call(e.exports, e, e.exports, i),
            e.l = !0,
            e.exports
        }
        return i.m = n,
        i.c = r,
        i.d = function(t, e, n) {
            i.o(t, e) || Object.defineProperty(t, e, {
                configurable: !1,
                enumerable: !0,
                get: n
            })
        }
        ,
        i.n = function(t) {
            var e = t && t.__esModule ? function() {
                return t.default
            }
            : function() {
                return t
            }
            ;
            return i.d(e, "a", e),
            e
        }
        ,
        i.o = function(t, e) {
            return Object.prototype.hasOwnProperty.call(t, e)
        }
        ,
        i.p = "",
        i(i.s = 236)
    }([function(t, e) {
        t.exports = n
    }
    , , function(t, e) {
        var r = Object.setPrototypeOf || {
            __proto__: []
        }instanceof Array && function(t, e) {
            t.__proto__ = e
        }
        || function(t, e) {
            for (var n in e)
                e.hasOwnProperty(n) && (t[n] = e[n])
        }
        ;
        e.__extends = function(t, e) {
            function n() {
                this.constructor = t
            }
            r(t, e),
            t.prototype = null === e ? Object.create(e) : (n.prototype = e.prototype,
            new n)
        }
    }
    , function(t, e) {
        t.exports = r
    }
    , function(t, o, e) {
        Object.defineProperty(o, "__esModule", {
            value: !0
        });
        var r = e(0)
          , c = e(3);
        function n(t) {
            t.height("")
        }
        function s(t) {
            var e, n = t[0].offsetWidth - t[0].clientWidth, r = t[0].offsetHeight - t[0].clientHeight;
            return n = i(n),
            e = {
                left: 0,
                right: 0,
                top: 0,
                bottom: r = i(r)
            },
            !function() {
                null === a && (t = c("<div><div/></div>").css({
                    position: "absolute",
                    top: -1e3,
                    left: 0,
                    border: 0,
                    padding: 0,
                    overflow: "scroll",
                    direction: "rtl"
                }).appendTo("body"),
                e = t.children().offset().left > t.offset().left,
                t.remove(),
                a = e);
                var t, e;
                return a
            }() || "rtl" !== t.css("direction") ? e.right = n : e.left = n,
            e
        }
        function i(t) {
            return t = Math.max(0, t),
            t = Math.round(t)
        }
        o.compensateScroll = function(t, e) {
            e.left && t.css({
                "border-left-width": 1,
                "margin-left": e.left - 1
            }),
            e.right && t.css({
                "border-right-width": 1,
                "margin-right": e.right - 1
            })
        }
        ,
        o.uncompensateScroll = function(t) {
            t.css({
                "margin-left": "",
                "margin-right": "",
                "border-left-width": "",
                "border-right-width": ""
            })
        }
        ,
        o.disableCursor = function() {
            c("body").addClass("fc-not-allowed")
        }
        ,
        o.enableCursor = function() {
            c("body").removeClass("fc-not-allowed")
        }
        ,
        o.distributeHeight = function(i, t, e) {
            var o = Math.floor(t / i.length)
              , s = Math.floor(t - o * (i.length - 1))
              , a = []
              , l = []
              , u = []
              , d = 0;
            n(i),
            i.each(function(t, e) {
                var n = t === i.length - 1 ? s : o
                  , r = c(e).outerHeight(!0);
                r < n ? (a.push(e),
                l.push(r),
                u.push(c(e).height())) : d += r
            }),
            e && (t -= d,
            o = Math.floor(t / a.length),
            s = Math.floor(t - o * (a.length - 1))),
            c(a).each(function(t, e) {
                var n = t === a.length - 1 ? s : o
                  , r = l[t]
                  , i = n - (r - u[t]);
                r < n && c(e).height(i)
            })
        }
        ,
        o.undistributeHeight = n,
        o.matchCellWidths = function(t) {
            var r = 0;
            return t.find("> *").each(function(t, e) {
                var n = c(e).outerWidth();
                r < n && (r = n)
            }),
            r++,
            t.width(r),
            r
        }
        ,
        o.subtractInnerElHeight = function(t, e) {
            var n, r = t.add(e);
            return r.css({
                position: "relative",
                left: -1
            }),
            n = t.outerHeight() - e.outerHeight(),
            r.css({
                position: "",
                left: ""
            }),
            n
        }
        ,
        o.getScrollParent = function(t) {
            var e = t.css("position")
              , n = t.parents().filter(function() {
                var t = c(this);
                return /(auto|scroll)/.test(t.css("overflow") + t.css("overflow-y") + t.css("overflow-x"))
            }).eq(0);
            return "fixed" !== e && n.length ? n : c(t[0].ownerDocument || document)
        }
        ,
        o.getOuterRect = function(t, e) {
            var n = t.offset()
              , r = n.left - (e ? e.left : 0)
              , i = n.top - (e ? e.top : 0);
            return {
                left: r,
                right: r + t.outerWidth(),
                top: i,
                bottom: i + t.outerHeight()
            }
        }
        ,
        o.getClientRect = function(t, e) {
            var n = t.offset()
              , r = s(t)
              , i = n.left + l(t, "border-left-width") + r.left - (e ? e.left : 0)
              , o = n.top + l(t, "border-top-width") + r.top - (e ? e.top : 0);
            return {
                left: i,
                right: i + t[0].clientWidth,
                top: o,
                bottom: o + t[0].clientHeight
            }
        }
        ,
        o.getContentRect = function(t, e) {
            var n = t.offset()
              , r = n.left + l(t, "border-left-width") + l(t, "padding-left") - (e ? e.left : 0)
              , i = n.top + l(t, "border-top-width") + l(t, "padding-top") - (e ? e.top : 0);
            return {
                left: r,
                right: r + t.width(),
                top: i,
                bottom: i + t.height()
            }
        }
        ,
        o.getScrollbarWidths = s;
        var a = null;
        function l(t, e) {
            return parseFloat(t.css(e)) || 0
        }
        function u(t) {
            t.preventDefault()
        }
        function d(t, e, n, r, i) {
            if (n.func)
                return n.func(t, e);
            var o = t[n.field]
              , s = e[n.field];
            return null == o && r && (o = r[n.field]),
            null == s && i && (s = i[n.field]),
            p(o, s) * (n.order || 1)
        }
        function p(t, e) {
            return t || e ? null == e ? -1 : null == t ? 1 : "string" === c.type(t) || "string" === c.type(e) ? String(t).localeCompare(String(e)) : t - e : 0
        }
        function h(t, e) {
            var n, r, i;
            for (n = 0; n < o.unitsDesc.length && !(1 <= (i = f(r = o.unitsDesc[n], t, e)) && w(i)); n++)
                ;
            return r
        }
        function f(t, e, n) {
            return null != n ? n.diff(e, t, !0) : r.isDuration(e) ? e.as(t) : e.end.diff(e.start, t, !0)
        }
        function g(t) {
            return Boolean(t.hours() || t.minutes() || t.seconds() || t.milliseconds())
        }
        function v() {
            for (var t = [], e = 0; e < arguments.length; e++)
                t[e] = arguments[e];
            var n = window.console;
            if (n && n.log)
                return n.log.apply(n, t)
        }
        o.isPrimaryMouseButton = function(t) {
            return 1 === t.which && !t.ctrlKey
        }
        ,
        o.getEvX = function(t) {
            var e = t.originalEvent.touches;
            return e && e.length ? e[0].pageX : t.pageX
        }
        ,
        o.getEvY = function(t) {
            var e = t.originalEvent.touches;
            return e && e.length ? e[0].pageY : t.pageY
        }
        ,
        o.getEvIsTouch = function(t) {
            return /^touch/.test(t.type)
        }
        ,
        o.preventSelection = function(t) {
            t.addClass("fc-unselectable").on("selectstart", u)
        }
        ,
        o.allowSelection = function(t) {
            t.removeClass("fc-unselectable").off("selectstart", u)
        }
        ,
        o.preventDefault = u,
        o.intersectRects = function(t, e) {
            var n = {
                left: Math.max(t.left, e.left),
                right: Math.min(t.right, e.right),
                top: Math.max(t.top, e.top),
                bottom: Math.min(t.bottom, e.bottom)
            };
            return n.left < n.right && n.top < n.bottom && n
        }
        ,
        o.constrainPoint = function(t, e) {
            return {
                left: Math.min(Math.max(t.left, e.left), e.right),
                top: Math.min(Math.max(t.top, e.top), e.bottom)
            }
        }
        ,
        o.getRectCenter = function(t) {
            return {
                left: (t.left + t.right) / 2,
                top: (t.top + t.bottom) / 2
            }
        }
        ,
        o.diffPoints = function(t, e) {
            return {
                left: t.left - e.left,
                top: t.top - e.top
            }
        }
        ,
        o.parseFieldSpecs = function(t) {
            var e, n, r = [], i = [];
            for ("string" == typeof t ? i = t.split(/\s*,\s*/) : "function" == typeof t ? i = [t] : c.isArray(t) && (i = t),
            e = 0; e < i.length; e++)
                "string" == typeof (n = i[e]) ? r.push("-" === n.charAt(0) ? {
                    field: n.substring(1),
                    order: -1
                } : {
                    field: n,
                    order: 1
                }) : "function" == typeof n && r.push({
                    func: n
                });
            return r
        }
        ,
        o.compareByFieldSpecs = function(t, e, n, r, i) {
            var o, s;
            for (o = 0; o < n.length; o++)
                if (s = d(t, e, n[o], r, i))
                    return s;
            return 0
        }
        ,
        o.compareByFieldSpec = d,
        o.flexibleCompare = p,
        o.dayIDs = ["sun", "mon", "tue", "wed", "thu", "fri", "sat"],
        o.unitsDesc = ["year", "month", "week", "day", "hour", "minute", "second", "millisecond"],
        o.diffDayTime = function(t, e) {
            return r.duration({
                days: t.clone().stripTime().diff(e.clone().stripTime(), "days"),
                ms: t.time() - e.time()
            })
        }
        ,
        o.diffDay = function(t, e) {
            return r.duration({
                days: t.clone().stripTime().diff(e.clone().stripTime(), "days")
            })
        }
        ,
        o.diffByUnit = function(t, e, n) {
            return r.duration(Math.round(t.diff(e, n, !0)), n)
        }
        ,
        o.computeGreatestUnit = h,
        o.computeDurationGreatestUnit = function(t, e) {
            var n = h(t);
            return "week" === n && "object" == typeof e && e.days && (n = "day"),
            n
        }
        ,
        o.divideRangeByDuration = function(t, e, n) {
            var r;
            return g(n) ? (e - t) / n : (r = n.asMonths(),
            1 <= Math.abs(r) && w(r) ? e.diff(t, "months", !0) / r : e.diff(t, "days", !0) / n.asDays())
        }
        ,
        o.divideDurationByDuration = function(t, e) {
            var n, r;
            return g(t) || g(e) ? t / e : (n = t.asMonths(),
            r = e.asMonths(),
            1 <= Math.abs(n) && w(n) && 1 <= Math.abs(r) && w(r) ? n / r : t.asDays() / e.asDays())
        }
        ,
        o.multiplyDuration = function(t, e) {
            var n;
            return g(t) ? r.duration(t * e) : (n = t.asMonths(),
            1 <= Math.abs(n) && w(n) ? r.duration({
                months: n * e
            }) : r.duration({
                days: t.asDays() * e
            }))
        }
        ,
        o.durationHasTime = g,
        o.isNativeDate = function(t) {
            return "[object Date]" === Object.prototype.toString.call(t) || t instanceof Date
        }
        ,
        o.isTimeString = function(t) {
            return "string" == typeof t && /^\d+\:\d+(?:\:\d+\.?(?:\d{3})?)?$/.test(t)
        }
        ,
        o.log = v,
        o.warn = function() {
            for (var t = [], e = 0; e < arguments.length; e++)
                t[e] = arguments[e];
            var n = window.console;
            return n && n.warn ? n.warn.apply(n, t) : v.apply(null, t)
        }
        ;
        var y = {}.hasOwnProperty;
        function m(t, e) {
            return y.call(t, e)
        }
        function b(t) {
            return (t + "").replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/'/g, "&#039;").replace(/"/g, "&quot;").replace(/\n/g, "<br />")
        }
        function w(t) {
            return t % 1 == 0
        }
        o.mergeProps = function t(e, n) {
            var r, i, o, s, a, l, u = {};
            if (n)
                for (r = 0; r < n.length; r++) {
                    for (i = n[r],
                    o = [],
                    s = e.length - 1; 0 <= s; s--)
                        if ("object" == typeof (a = e[s][i]))
                            o.unshift(a);
                        else if (void 0 !== a) {
                            u[i] = a;
                            break
                        }
                    o.length && (u[i] = t(o))
                }
            for (r = e.length - 1; 0 <= r; r--)
                for (i in l = e[r])
                    i in u || (u[i] = l[i]);
            return u
        }
        ,
        o.copyOwnProps = function(t, e) {
            for (var n in t)
                m(t, n) && (e[n] = t[n])
        }
        ,
        o.hasOwnProp = m,
        o.applyAll = function(t, e, n) {
            if (c.isFunction(t) && (t = [t]),
            t) {
                var r = void 0
                  , i = void 0;
                for (r = 0; r < t.length; r++)
                    i = t[r].apply(e, n) || i;
                return i
            }
        }
        ,
        o.removeMatching = function(t, e) {
            for (var n = 0, r = 0; r < t.length; )
                e(t[r]) ? (t.splice(r, 1),
                n++) : r++;
            return n
        }
        ,
        o.removeExact = function(t, e) {
            for (var n = 0, r = 0; r < t.length; )
                t[r] === e ? (t.splice(r, 1),
                n++) : r++;
            return n
        }
        ,
        o.isArraysEqual = function(t, e) {
            var n, r = t.length;
            if (null == r || r !== e.length)
                return !1;
            for (n = 0; n < r; n++)
                if (t[n] !== e[n])
                    return !1;
            return !0
        }
        ,
        o.firstDefined = function() {
            for (var t = [], e = 0; e < arguments.length; e++)
                t[e] = arguments[e];
            for (var n = 0; n < t.length; n++)
                if (void 0 !== t[n])
                    return t[n]
        }
        ,
        o.htmlEscape = b,
        o.stripHtmlEntities = function(t) {
            return t.replace(/&.*?;/g, "")
        }
        ,
        o.cssToStr = function(t) {
            var n = [];
            return c.each(t, function(t, e) {
                null != e && n.push(t + ":" + e)
            }),
            n.join(";")
        }
        ,
        o.attrsToStr = function(t) {
            var n = [];
            return c.each(t, function(t, e) {
                null != e && n.push(t + '="' + b(e) + '"')
            }),
            n.join(" ")
        }
        ,
        o.capitaliseFirstLetter = function(t) {
            return t.charAt(0).toUpperCase() + t.slice(1)
        }
        ,
        o.compareNumbers = function(t, e) {
            return t - e
        }
        ,
        o.isInt = w,
        o.proxy = function(t, e) {
            var n = t[e];
            return function() {
                return n.apply(t, arguments)
            }
        }
        ,
        o.debounce = function(e, n, r) {
            var i, o, s, a, l;
            void 0 === r && (r = !1);
            var u = function() {
                var t = +new Date - a;
                t < n ? i = setTimeout(u, n - t) : (i = null,
                r || (l = e.apply(s, o),
                s = o = null))
            };
            return function() {
                s = this,
                o = arguments,
                a = +new Date;
                var t = r && !i;
                return i || (i = setTimeout(u, n)),
                t && (l = e.apply(s, o),
                s = o = null),
                l
            }
        }
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(0)
          , i = n(10)
          , o = function() {
            function s(t, e) {
                this.isStart = !0,
                this.isEnd = !0,
                r.isMoment(t) && (t = t.clone().stripZone()),
                r.isMoment(e) && (e = e.clone().stripZone()),
                t && (this.startMs = t.valueOf()),
                e && (this.endMs = e.valueOf())
            }
            return s.invertRanges = function(t, e) {
                var n, r, i = [], o = e.startMs;
                for (t.sort(a),
                n = 0; n < t.length; n++)
                    (r = t[n]).startMs > o && i.push(new s(o,r.startMs)),
                    r.endMs > o && (o = r.endMs);
                return o < e.endMs && i.push(new s(o,e.endMs)),
                i
            }
            ,
            s.prototype.intersect = function(t) {
                var e = this.startMs
                  , n = this.endMs
                  , r = null;
                return null != t.startMs && (e = null == e ? t.startMs : Math.max(e, t.startMs)),
                null != t.endMs && (n = null == n ? t.endMs : Math.min(n, t.endMs)),
                (null == e || null == n || e < n) && ((r = new s(e,n)).isStart = this.isStart && e === this.startMs,
                r.isEnd = this.isEnd && n === this.endMs),
                r
            }
            ,
            s.prototype.intersectsWith = function(t) {
                return (null == this.endMs || null == t.startMs || this.endMs > t.startMs) && (null == this.startMs || null == t.endMs || this.startMs < t.endMs)
            }
            ,
            s.prototype.containsRange = function(t) {
                return (null == this.startMs || null != t.startMs && t.startMs >= this.startMs) && (null == this.endMs || null != t.endMs && t.endMs <= this.endMs)
            }
            ,
            s.prototype.containsDate = function(t) {
                var e = t.valueOf();
                return (null == this.startMs || e >= this.startMs) && (null == this.endMs || e < this.endMs)
            }
            ,
            s.prototype.constrainDate = function(t) {
                var e = t.valueOf();
                return null != this.startMs && e < this.startMs && (e = this.startMs),
                null != this.endMs && e >= this.endMs && (e = this.endMs - 1),
                e
            }
            ,
            s.prototype.equals = function(t) {
                return this.startMs === t.startMs && this.endMs === t.endMs
            }
            ,
            s.prototype.clone = function() {
                var t = new s(this.startMs,this.endMs);
                return t.isStart = this.isStart,
                t.isEnd = this.isEnd,
                t
            }
            ,
            s.prototype.getStart = function() {
                return null != this.startMs ? i.default.utc(this.startMs).stripZone() : null
            }
            ,
            s.prototype.getEnd = function() {
                return null != this.endMs ? i.default.utc(this.endMs).stripZone() : null
            }
            ,
            s.prototype.as = function(t) {
                return r.utc(this.endMs).diff(r.utc(this.startMs), t, !0)
            }
            ,
            s
        }();
        function a(t, e) {
            return t.startMs - e.startMs
        }
        e.default = o
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var i = n(2)
          , o = n(3)
          , s = n(208)
          , r = n(33)
          , a = n(49)
          , l = function(n) {
            function r(t) {
                var e = n.call(this) || this;
                return e.calendar = t,
                e.className = [],
                e.uid = String(r.uuid++),
                e
            }
            return i.__extends(r, n),
            r.parse = function(t, e) {
                var n = new this(e);
                return !("object" != typeof t || !n.applyProps(t)) && n
            }
            ,
            r.normalizeId = function(t) {
                return t ? String(t) : null
            }
            ,
            r.prototype.fetch = function(t, e, n) {}
            ,
            r.prototype.removeEventDefsById = function(t) {}
            ,
            r.prototype.removeAllEventDefs = function() {}
            ,
            r.prototype.getPrimitive = function(t) {}
            ,
            r.prototype.parseEventDefs = function(t) {
                var e, n, r = [];
                for (e = 0; e < t.length; e++)
                    (n = this.parseEventDef(t[e])) && r.push(n);
                return r
            }
            ,
            r.prototype.parseEventDef = function(t) {
                var e = this.calendar.opt("eventDataTransform")
                  , n = this.eventDataTransform;
                return e && (t = e(t, this.calendar)),
                n && (t = n(t, this.calendar)),
                a.default.parse(t, this)
            }
            ,
            r.prototype.applyManualStandardProps = function(t) {
                return null != t.id && (this.id = r.normalizeId(t.id)),
                o.isArray(t.className) ? this.className = t.className : "string" == typeof t.className && (this.className = t.className.split(/\s+/)),
                !0
            }
            ,
            r.uuid = 0,
            r.defineStandardProps = s.default.defineStandardProps,
            r.copyVerbatimStandardProps = s.default.copyVerbatimStandardProps,
            r
        }(r.default);
        e.default = l,
        s.default.mixInto(l),
        l.defineStandardProps({
            id: !1,
            className: !1,
            color: !0,
            backgroundColor: !0,
            borderColor: !0,
            textColor: !0,
            editable: !0,
            startEditable: !0,
            durationEditable: !0,
            rendering: !0,
            overlap: !0,
            constraint: !0,
            allDayDefault: !0,
            eventDataTransform: !0
        })
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , i = n(3)
          , o = n(14)
          , s = 0
          , a = function(t) {
            function e() {
                return null !== t && t.apply(this, arguments) || this
            }
            return r.__extends(e, t),
            e.prototype.listenTo = function(t, e, n) {
                if ("object" == typeof e)
                    for (var r in e)
                        e.hasOwnProperty(r) && this.listenTo(t, r, e[r]);
                else
                    "string" == typeof e && t.on(e + "." + this.getListenerNamespace(), i.proxy(n, this))
            }
            ,
            e.prototype.stopListeningTo = function(t, e) {
                t.off((e || "") + "." + this.getListenerNamespace())
            }
            ,
            e.prototype.getListenerNamespace = function() {
                return null == this.listenerId && (this.listenerId = s++),
                "_listener" + this.listenerId
            }
            ,
            e
        }(o.default);
        e.default = a
    }
    , , , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var u = n(0)
          , d = n(3)
          , c = n(4)
          , p = /^\s*\d{4}-\d\d$/
          , h = /^\s*\d{4}-(?:(\d\d-\d\d)|(W\d\d$)|(W\d\d-\d)|(\d\d\d))((T| )(\d\d(:\d\d(:\d\d(\.\d+)?)?)?)?)?$/
          , r = u.fn;
        e.newMomentProto = r;
        var i = d.extend({}, r);
        e.oldMomentProto = i;
        var o = u.momentProperties;
        o.push("_fullCalendar"),
        o.push("_ambigTime"),
        o.push("_ambigZone"),
        e.oldMomentFormat = function(t, e) {
            return i.format.call(t, e)
        }
        ;
        var s = function() {
            return a(arguments)
        };
        function a(t, e, n) {
            void 0 === e && (e = !1),
            void 0 === n && (n = !1);
            var r, i, o, s, a = t[0], l = 1 === t.length && "string" == typeof a;
            return u.isMoment(a) || c.isNativeDate(a) || void 0 === a ? s = u.apply(null, t) : (i = r = !1,
            l ? p.test(a) ? (t = [a += "-01"],
            i = r = !0) : (o = h.exec(a)) && (r = !o[5],
            i = !0) : d.isArray(a) && (i = !0),
            s = e || r ? u.utc.apply(u, t) : u.apply(null, t),
            r ? (s._ambigTime = !0,
            s._ambigZone = !0) : n && (i ? s._ambigZone = !0 : l && s.utcOffset(a))),
            s._fullCalendar = !0,
            s
        }
        (e.default = s).utc = function() {
            var t = a(arguments, !0);
            return t.hasTime() && t.utc(),
            t
        }
        ,
        s.parseZone = function() {
            return a(arguments, !0, !0)
        }
        ,
        r.week = r.weeks = function(t) {
            var e = this._locale._fullCalendar_weekCalc;
            return null == t && "function" == typeof e ? e(this) : "ISO" === e ? i.isoWeek.apply(this, arguments) : i.week.apply(this, arguments)
        }
        ,
        r.time = function(t) {
            if (!this._fullCalendar)
                return i.time.apply(this, arguments);
            if (null == t)
                return u.duration({
                    hours: this.hours(),
                    minutes: this.minutes(),
                    seconds: this.seconds(),
                    milliseconds: this.milliseconds()
                });
            this._ambigTime = !1,
            u.isDuration(t) || u.isMoment(t) || (t = u.duration(t));
            var e = 0;
            return u.isDuration(t) && (e = 24 * Math.floor(t.asDays())),
            this.hours(e + t.hours()).minutes(t.minutes()).seconds(t.seconds()).milliseconds(t.milliseconds())
        }
        ,
        r.stripTime = function() {
            return this._ambigTime || (this.utc(!0),
            this.set({
                hours: 0,
                minutes: 0,
                seconds: 0,
                ms: 0
            }),
            this._ambigTime = !0,
            this._ambigZone = !0),
            this
        }
        ,
        r.hasTime = function() {
            return !this._ambigTime
        }
        ,
        r.stripZone = function() {
            var t;
            return this._ambigZone || (t = this._ambigTime,
            this.utc(!0),
            this._ambigTime = t || !1,
            this._ambigZone = !0),
            this
        }
        ,
        r.hasZone = function() {
            return !this._ambigZone
        }
        ,
        r.local = function(t) {
            return i.local.call(this, this._ambigZone || t),
            this._ambigTime = !1,
            this._ambigZone = !1,
            this
        }
        ,
        r.utc = function(t) {
            return i.utc.call(this, t),
            this._ambigTime = !1,
            this._ambigZone = !1,
            this
        }
        ,
        r.utcOffset = function(t) {
            return null != t && (this._ambigTime = !1,
            this._ambigZone = !1),
            i.utcOffset.apply(this, arguments)
        }
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , i = n(3)
          , o = function(t) {
            function e() {
                return null !== t && t.apply(this, arguments) || this
            }
            return r.__extends(e, t),
            e.prototype.on = function(t, e) {
                return i(this).on(t, this._prepareIntercept(e)),
                this
            }
            ,
            e.prototype.one = function(t, e) {
                return i(this).one(t, this._prepareIntercept(e)),
                this
            }
            ,
            e.prototype._prepareIntercept = function(n) {
                var t = function(t, e) {
                    return n.apply(e.context || this, e.args || [])
                };
                return n.guid || (n.guid = i.guid++),
                t.guid = n.guid,
                t
            }
            ,
            e.prototype.off = function(t, e) {
                return i(this).off(t, e),
                this
            }
            ,
            e.prototype.trigger = function(t) {
                for (var e = [], n = 1; n < arguments.length; n++)
                    e[n - 1] = arguments[n];
                return i(this).triggerHandler(t, {
                    args: e
                }),
                this
            }
            ,
            e.prototype.triggerWith = function(t, e, n) {
                return i(this).triggerHandler(t, {
                    context: e,
                    args: n
                }),
                this
            }
            ,
            e.prototype.hasHandlers = function(t) {
                var e = i._data(this, "events");
                return e && e[t] && 0 < e[t].length
            }
            ,
            e
        }(n(14).default);
        e.default = o
    }
    , function(t, e) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var n = function() {
            function t(t, e) {
                this.isAllDay = !1,
                this.unzonedRange = t,
                this.isAllDay = e
            }
            return t.prototype.toLegacy = function(t) {
                return {
                    start: t.msToMoment(this.unzonedRange.startMs, this.isAllDay),
                    end: t.msToMoment(this.unzonedRange.endMs, this.isAllDay)
                }
            }
            ,
            t
        }();
        e.default = n
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var i = n(2)
          , r = n(34)
          , o = n(209)
          , s = n(17)
          , a = function(r) {
            function t() {
                return null !== r && r.apply(this, arguments) || this
            }
            return i.__extends(t, r),
            t.prototype.buildInstances = function() {
                return [this.buildInstance()]
            }
            ,
            t.prototype.buildInstance = function() {
                return new o.default(this,this.dateProfile)
            }
            ,
            t.prototype.isAllDay = function() {
                return this.dateProfile.isAllDay()
            }
            ,
            t.prototype.clone = function() {
                var t = r.prototype.clone.call(this);
                return t.dateProfile = this.dateProfile,
                t
            }
            ,
            t.prototype.rezone = function() {
                var t = this.source.calendar
                  , e = this.dateProfile;
                this.dateProfile = new s.default(t.moment(e.start),e.end ? t.moment(e.end) : null,t)
            }
            ,
            t.prototype.applyManualStandardProps = function(t) {
                var e = r.prototype.applyManualStandardProps.call(this, t)
                  , n = s.default.parse(t, this.source);
                return !!n && (this.dateProfile = n,
                null != t.date && (this.miscProps.date = t.date),
                e)
            }
            ,
            t
        }(r.default);
        (e.default = a).defineStandardProps({
            start: !1,
            date: !1,
            end: !1,
            allDay: !1
        })
    }
    , function(t, e) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var n = function() {
            function t() {}
            return t.mixInto = function(e) {
                var n = this;
                Object.getOwnPropertyNames(this.prototype).forEach(function(t) {
                    e.prototype[t] || (e.prototype[t] = n.prototype[t])
                })
            }
            ,
            t.mixOver = function(e) {
                var n = this;
                Object.getOwnPropertyNames(this.prototype).forEach(function(t) {
                    e.prototype[t] = n.prototype[t]
                })
            }
            ,
            t
        }();
        e.default = n
    }
    , function(t, e) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var n = function() {
            function t(t) {
                this.view = t._getView(),
                this.component = t
            }
            return t.prototype.opt = function(t) {
                return this.view.opt(t)
            }
            ,
            t.prototype.end = function() {}
            ,
            t
        }();
        e.default = n
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        }),
        e.version = "3.9.0",
        e.internalApiVersion = 12;
        var r = n(4);
        e.applyAll = r.applyAll,
        e.debounce = r.debounce,
        e.isInt = r.isInt,
        e.htmlEscape = r.htmlEscape,
        e.cssToStr = r.cssToStr,
        e.proxy = r.proxy,
        e.capitaliseFirstLetter = r.capitaliseFirstLetter,
        e.getOuterRect = r.getOuterRect,
        e.getClientRect = r.getClientRect,
        e.getContentRect = r.getContentRect,
        e.getScrollbarWidths = r.getScrollbarWidths,
        e.preventDefault = r.preventDefault,
        e.parseFieldSpecs = r.parseFieldSpecs,
        e.compareByFieldSpecs = r.compareByFieldSpecs,
        e.compareByFieldSpec = r.compareByFieldSpec,
        e.flexibleCompare = r.flexibleCompare,
        e.computeGreatestUnit = r.computeGreatestUnit,
        e.divideRangeByDuration = r.divideRangeByDuration,
        e.divideDurationByDuration = r.divideDurationByDuration,
        e.multiplyDuration = r.multiplyDuration,
        e.durationHasTime = r.durationHasTime,
        e.log = r.log,
        e.warn = r.warn,
        e.removeExact = r.removeExact,
        e.intersectRects = r.intersectRects;
        var i = n(47);
        e.formatDate = i.formatDate,
        e.formatRange = i.formatRange,
        e.queryMostGranularFormatUnit = i.queryMostGranularFormatUnit;
        var o = n(31);
        e.datepickerLocale = o.datepickerLocale,
        e.locale = o.locale;
        var s = n(10);
        e.moment = s.default;
        var a = n(11);
        e.EmitterMixin = a.default;
        var l = n(7);
        e.ListenerMixin = l.default;
        var u = n(48);
        e.Model = u.default;
        var d = n(207);
        e.Constraints = d.default;
        var c = n(5);
        e.UnzonedRange = c.default;
        var p = n(12);
        e.ComponentFootprint = p.default;
        var h = n(212);
        e.BusinessHourGenerator = h.default;
        var f = n(34);
        e.EventDef = f.default;
        var g = n(37);
        e.EventDefMutation = g.default;
        var v = n(38);
        e.EventSourceParser = v.default;
        var y = n(6);
        e.EventSource = y.default;
        var m = n(51);
        e.defineThemeSystem = m.defineThemeSystem;
        var b = n(18);
        e.EventInstanceGroup = b.default;
        var w = n(52);
        e.ArrayEventSource = w.default;
        var D = n(215);
        e.FuncEventSource = D.default;
        var E = n(216);
        e.JsonFeedEventSource = E.default;
        var S = n(36);
        e.EventFootprint = S.default;
        var C = n(33);
        e.Class = C.default;
        var R = n(14);
        e.Mixin = R.default;
        var T = n(53);
        e.CoordCache = T.default;
        var M = n(54);
        e.DragListener = M.default;
        var I = n(20);
        e.Promise = I.default;
        var P = n(217);
        e.TaskQueue = P.default;
        var H = n(218);
        e.RenderQueue = H.default;
        var _ = n(39);
        e.Scroller = _.default;
        var x = n(19);
        e.Theme = x.default;
        var O = n(219);
        e.DateComponent = O.default;
        var F = n(40);
        e.InteractiveDateComponent = F.default;
        var z = n(220);
        e.Calendar = z.default;
        var A = n(41);
        e.View = A.default;
        var B = n(22);
        e.defineView = B.defineView,
        e.getViewConfig = B.getViewConfig;
        var k = n(55);
        e.DayTableMixin = k.default;
        var L = n(56);
        e.BusinessHourRenderer = L.default;
        var V = n(42);
        e.EventRenderer = V.default;
        var G = n(57);
        e.FillRenderer = G.default;
        var j = n(58);
        e.HelperRenderer = j.default;
        var N = n(222);
        e.ExternalDropping = N.default;
        var U = n(223);
        e.EventResizing = U.default;
        var W = n(59);
        e.EventPointing = W.default;
        var q = n(224);
        e.EventDragging = q.default;
        var Y = n(225);
        e.DateSelecting = Y.default;
        var Z = n(60);
        e.StandardInteractionsMixin = Z.default;
        var Q = n(226);
        e.AgendaView = Q.default;
        var X = n(227);
        e.TimeGrid = X.default;
        var $ = n(61);
        e.DayGrid = $.default;
        var K = n(62);
        e.BasicView = K.default;
        var J = n(229);
        e.MonthView = J.default;
        var tt = n(230);
        e.ListView = tt.default
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(5)
          , i = function() {
            function u(t, e, n) {
                this.start = t,
                this.end = e || null,
                this.unzonedRange = this.buildUnzonedRange(n)
            }
            return u.parse = function(t, e) {
                var n = t.start || t.date
                  , r = t.end;
                if (!n)
                    return !1;
                var i = e.calendar
                  , o = i.moment(n)
                  , s = r ? i.moment(r) : null
                  , a = t.allDay
                  , l = i.opt("forceEventDuration");
                return !!o.isValid() && (!s || s.isValid() && s.isAfter(o) || (s = null),
                null == a && null == (a = e.allDayDefault) && (a = i.opt("allDayDefault")),
                !0 === a ? (o.stripTime(),
                s && s.stripTime()) : !1 === a && (o.hasTime() || o.time(0),
                s && !s.hasTime() && s.time(0)),
                !s && l && (s = i.getDefaultEventEnd(!o.hasTime(), o)),
                new u(o,s,i))
            }
            ,
            u.isStandardProp = function(t) {
                return "start" === t || "date" === t || "end" === t || "allDay" === t
            }
            ,
            u.prototype.isAllDay = function() {
                return !(this.start.hasTime() || this.end && this.end.hasTime())
            }
            ,
            u.prototype.buildUnzonedRange = function(t) {
                var e = this.start.clone().stripZone().valueOf()
                  , n = this.getEnd(t).stripZone().valueOf();
                return new r.default(e,n)
            }
            ,
            u.prototype.getEnd = function(t) {
                return this.end ? this.end.clone() : t.getDefaultEventEnd(this.isAllDay(), this.start)
            }
            ,
            u
        }();
        e.default = i
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(5)
          , i = n(35)
          , s = n(211)
          , o = function() {
            function t(t) {
                this.eventInstances = t || []
            }
            return t.prototype.getAllEventRanges = function(t) {
                return t ? this.sliceNormalRenderRanges(t) : this.eventInstances.map(i.eventInstanceToEventRange)
            }
            ,
            t.prototype.sliceRenderRanges = function(t) {
                return this.isInverse() ? this.sliceInverseRenderRanges(t) : this.sliceNormalRenderRanges(t)
            }
            ,
            t.prototype.sliceNormalRenderRanges = function(t) {
                var e, n, r, i = this.eventInstances, o = [];
                for (e = 0; e < i.length; e++)
                    (r = (n = i[e]).dateProfile.unzonedRange.intersect(t)) && o.push(new s.default(r,n.def,n));
                return o
            }
            ,
            t.prototype.sliceInverseRenderRanges = function(t) {
                var e = this.eventInstances.map(i.eventInstanceToUnzonedRange)
                  , n = this.getEventDef();
                return (e = r.default.invertRanges(e, t)).map(function(t) {
                    return new s.default(t,n)
                })
            }
            ,
            t.prototype.isInverse = function() {
                return this.getEventDef().hasInverseRendering()
            }
            ,
            t.prototype.getEventDef = function() {
                return this.explicitEventDef || this.eventInstances[0].def
            }
            ,
            t
        }();
        e.default = o
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(3)
          , i = function() {
            function t(t) {
                this.optionsManager = t,
                this.processIconOverride()
            }
            return t.prototype.processIconOverride = function() {
                this.iconOverrideOption && this.setIconOverride(this.optionsManager.get(this.iconOverrideOption))
            }
            ,
            t.prototype.setIconOverride = function(t) {
                var e, n;
                if (r.isPlainObject(t)) {
                    for (n in e = r.extend({}, this.iconClasses),
                    t)
                        e[n] = this.applyIconOverridePrefix(t[n]);
                    this.iconClasses = e
                } else
                    !1 === t && (this.iconClasses = {})
            }
            ,
            t.prototype.applyIconOverridePrefix = function(t) {
                var e = this.iconOverridePrefix;
                return e && 0 !== t.indexOf(e) && (t = e + t),
                t
            }
            ,
            t.prototype.getClass = function(t) {
                return this.classes[t] || ""
            }
            ,
            t.prototype.getIconClass = function(t) {
                var e = this.iconClasses[t];
                return e ? this.baseIconClass + " " + e : ""
            }
            ,
            t.prototype.getCustomButtonIconClass = function(t) {
                var e;
                return this.iconOverrideCustomButtonOption && (e = t[this.iconOverrideCustomButtonOption]) ? this.baseIconClass + " " + this.applyIconOverridePrefix(e) : ""
            }
            ,
            t
        }();
        (e.default = i).prototype.classes = {},
        i.prototype.iconClasses = {},
        i.prototype.baseIconClass = "",
        i.prototype.iconOverridePrefix = ""
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(3)
          , i = {
            construct: function(t) {
                var e = r.Deferred()
                  , n = e.promise();
                return "function" == typeof t && t(function(t) {
                    e.resolve(t),
                    o(n, t)
                }, function() {
                    e.reject(),
                    s(n)
                }),
                n
            },
            resolve: function(t) {
                var e = r.Deferred().resolve(t).promise();
                return o(e, t),
                e
            },
            reject: function() {
                var t = r.Deferred().reject().promise();
                return s(t),
                t
            }
        };
        function o(e, n) {
            e.then = function(t) {
                return "function" == typeof t ? i.resolve(t(n)) : e
            }
        }
        function s(n) {
            n.then = function(t, e) {
                return "function" == typeof e && e(),
                n
            }
        }
        e.default = i
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(3)
          , i = n(16)
          , o = n(11)
          , s = n(7);
        i.touchMouseIgnoreWait = 500;
        var a = null
          , l = 0
          , u = function() {
            function t() {
                this.isTouching = !1,
                this.mouseIgnoreDepth = 0
            }
            return t.get = function() {
                return a || (a = new t).bind(),
                a
            }
            ,
            t.needed = function() {
                t.get(),
                l++
            }
            ,
            t.unneeded = function() {
                --l || (a.unbind(),
                a = null)
            }
            ,
            t.prototype.bind = function() {
                var e = this;
                this.listenTo(r(document), {
                    touchstart: this.handleTouchStart,
                    touchcancel: this.handleTouchCancel,
                    touchend: this.handleTouchEnd,
                    mousedown: this.handleMouseDown,
                    mousemove: this.handleMouseMove,
                    mouseup: this.handleMouseUp,
                    click: this.handleClick,
                    selectstart: this.handleSelectStart,
                    contextmenu: this.handleContextMenu
                }),
                window.addEventListener("touchmove", this.handleTouchMoveProxy = function(t) {
                    e.handleTouchMove(r.Event(t))
                }
                , {
                    passive: !1
                }),
                window.addEventListener("scroll", this.handleScrollProxy = function(t) {
                    e.handleScroll(r.Event(t))
                }
                , !0)
            }
            ,
            t.prototype.unbind = function() {
                this.stopListeningTo(r(document)),
                window.removeEventListener("touchmove", this.handleTouchMoveProxy),
                window.removeEventListener("scroll", this.handleScrollProxy, !0)
            }
            ,
            t.prototype.handleTouchStart = function(t) {
                this.stopTouch(t, !0),
                this.isTouching = !0,
                this.trigger("touchstart", t)
            }
            ,
            t.prototype.handleTouchMove = function(t) {
                this.isTouching && this.trigger("touchmove", t)
            }
            ,
            t.prototype.handleTouchCancel = function(t) {
                this.isTouching && (this.trigger("touchcancel", t),
                this.stopTouch(t))
            }
            ,
            t.prototype.handleTouchEnd = function(t) {
                this.stopTouch(t)
            }
            ,
            t.prototype.handleMouseDown = function(t) {
                this.shouldIgnoreMouse() || this.trigger("mousedown", t)
            }
            ,
            t.prototype.handleMouseMove = function(t) {
                this.shouldIgnoreMouse() || this.trigger("mousemove", t)
            }
            ,
            t.prototype.handleMouseUp = function(t) {
                this.shouldIgnoreMouse() || this.trigger("mouseup", t)
            }
            ,
            t.prototype.handleClick = function(t) {
                this.shouldIgnoreMouse() || this.trigger("click", t)
            }
            ,
            t.prototype.handleSelectStart = function(t) {
                this.trigger("selectstart", t)
            }
            ,
            t.prototype.handleContextMenu = function(t) {
                this.trigger("contextmenu", t)
            }
            ,
            t.prototype.handleScroll = function(t) {
                this.trigger("scroll", t)
            }
            ,
            t.prototype.stopTouch = function(t, e) {
                void 0 === e && (e = !1),
                this.isTouching && (this.isTouching = !1,
                this.trigger("touchend", t),
                e || this.startTouchMouseIgnore())
            }
            ,
            t.prototype.startTouchMouseIgnore = function() {
                var t = this
                  , e = i.touchMouseIgnoreWait;
                e && (this.mouseIgnoreDepth++,
                setTimeout(function() {
                    t.mouseIgnoreDepth--
                }, e))
            }
            ,
            t.prototype.shouldIgnoreMouse = function() {
                return this.isTouching || Boolean(this.mouseIgnoreDepth)
            }
            ,
            t
        }();
        e.default = u,
        s.default.mixInto(u),
        o.default.mixInto(u)
    }
    , function(t, n, e) {
        Object.defineProperty(n, "__esModule", {
            value: !0
        });
        var r = e(16);
        n.viewHash = {},
        r.views = n.viewHash,
        n.defineView = function(t, e) {
            n.viewHash[t] = e
        }
        ,
        n.getViewConfig = function(t) {
            return n.viewHash[t]
        }
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , s = n(4)
          , i = function(o) {
            function t(t, e) {
                var n = o.call(this, e) || this;
                return n.component = t,
                n
            }
            return r.__extends(t, o),
            t.prototype.handleInteractionStart = function(t) {
                var e, n, r, i = this.subjectEl;
                this.component.hitsNeeded(),
                this.computeScrollBounds(),
                t ? (r = n = {
                    left: s.getEvX(t),
                    top: s.getEvY(t)
                },
                i && (e = s.getOuterRect(i),
                r = s.constrainPoint(r, e)),
                this.origHit = this.queryHit(r.left, r.top),
                i && this.options.subjectCenter && (this.origHit && (e = s.intersectRects(this.origHit, e) || e),
                r = s.getRectCenter(e)),
                this.coordAdjust = s.diffPoints(r, n)) : (this.origHit = null,
                this.coordAdjust = null),
                o.prototype.handleInteractionStart.call(this, t)
            }
            ,
            t.prototype.handleDragStart = function(t) {
                var e;
                o.prototype.handleDragStart.call(this, t),
                (e = this.queryHit(s.getEvX(t), s.getEvY(t))) && this.handleHitOver(e)
            }
            ,
            t.prototype.handleDrag = function(t, e, n) {
                var r;
                o.prototype.handleDrag.call(this, t, e, n),
                a(r = this.queryHit(s.getEvX(n), s.getEvY(n)), this.hit) || (this.hit && this.handleHitOut(),
                r && this.handleHitOver(r))
            }
            ,
            t.prototype.handleDragEnd = function(t) {
                this.handleHitDone(),
                o.prototype.handleDragEnd.call(this, t)
            }
            ,
            t.prototype.handleHitOver = function(t) {
                var e = a(t, this.origHit);
                this.hit = t,
                this.trigger("hitOver", this.hit, e, this.origHit)
            }
            ,
            t.prototype.handleHitOut = function() {
                this.hit && (this.trigger("hitOut", this.hit),
                this.handleHitDone(),
                this.hit = null)
            }
            ,
            t.prototype.handleHitDone = function() {
                this.hit && this.trigger("hitDone", this.hit)
            }
            ,
            t.prototype.handleInteractionEnd = function(t, e) {
                o.prototype.handleInteractionEnd.call(this, t, e),
                this.origHit = null,
                this.hit = null,
                this.component.hitsNotNeeded()
            }
            ,
            t.prototype.handleScrollEnd = function() {
                o.prototype.handleScrollEnd.call(this),
                this.isDragging && (this.component.releaseHits(),
                this.component.prepareHits())
            }
            ,
            t.prototype.queryHit = function(t, e) {
                return this.coordAdjust && (t += this.coordAdjust.left,
                e += this.coordAdjust.top),
                this.component.queryHit(t, e)
            }
            ,
            t
        }(n(54).default);
        function a(t, e) {
            return !t && !e || !(!t || !e) && (t.component === e.component && o(t, e) && o(e, t))
        }
        function o(t, e) {
            for (var n in t)
                if (!/^(component|left|right|top|bottom)$/.test(n) && t[n] !== e[n])
                    return !1;
            return !0
        }
        e.default = i
    }
    , , , , , , , , function(t, o, e) {
        Object.defineProperty(o, "__esModule", {
            value: !0
        });
        var s = e(3)
          , n = e(0)
          , r = e(16)
          , i = e(32)
          , a = e(4);
        o.localeOptionHash = {},
        r.locales = o.localeOptionHash;
        var l = {
            buttonText: function(t) {
                return {
                    prev: a.stripHtmlEntities(t.prevText),
                    next: a.stripHtmlEntities(t.nextText),
                    today: a.stripHtmlEntities(t.currentText)
                }
            },
            monthYearFormat: function(t) {
                return t.showMonthAfterYear ? "YYYY[" + t.yearSuffix + "] MMMM" : "MMMM YYYY[" + t.yearSuffix + "]"
            }
        }
          , u = {
            dayOfMonthFormat: function(t, e) {
                var n = t.longDateFormat("l");
                return n = n.replace(/^Y+[^\w\s]*|[^\w\s]*Y+$/g, ""),
                e.isRTL ? n += " ddd" : n = "ddd " + n,
                n
            },
            mediumTimeFormat: function(t) {
                return t.longDateFormat("LT").replace(/\s*a$/i, "a")
            },
            smallTimeFormat: function(t) {
                return t.longDateFormat("LT").replace(":mm", "(:mm)").replace(/(\Wmm)$/, "($1)").replace(/\s*a$/i, "a")
            },
            extraSmallTimeFormat: function(t) {
                return t.longDateFormat("LT").replace(":mm", "(:mm)").replace(/(\Wmm)$/, "($1)").replace(/\s*a$/i, "t")
            },
            hourFormat: function(t) {
                return t.longDateFormat("LT").replace(":mm", "").replace(/(\Wmm)$/, "").replace(/\s*a$/i, "a")
            },
            noMeridiemTimeFormat: function(t) {
                return t.longDateFormat("LT").replace(/\s*a$/i, "")
            }
        }
          , d = {
            smallDayDateFormat: function(t) {
                return t.isRTL ? "D dd" : "dd D"
            },
            weekFormat: function(t) {
                return t.isRTL ? "w[ " + t.weekNumberTitle + "]" : "[" + t.weekNumberTitle + " ]w"
            },
            smallWeekFormat: function(t) {
                return t.isRTL ? "w[" + t.weekNumberTitle + "]" : "[" + t.weekNumberTitle + "]w"
            }
        };
        function c(t, e) {
            var n, r;
            n = o.localeOptionHash[t] || (o.localeOptionHash[t] = {}),
            e && (n = o.localeOptionHash[t] = i.mergeOptions([n, e])),
            r = p(t),
            s.each(u, function(t, e) {
                null == n[t] && (n[t] = e(r, n))
            }),
            i.globalDefaults.locale = t
        }
        function p(t) {
            return n.localeData(t) || n.localeData("en")
        }
        o.populateInstanceComputableOptions = function(n) {
            s.each(d, function(t, e) {
                null == n[t] && (n[t] = e(n))
            })
        }
        ,
        o.datepickerLocale = function(t, e, n) {
            var r = o.localeOptionHash[t] || (o.localeOptionHash[t] = {});
            r.isRTL = n.isRTL,
            r.weekNumberTitle = n.weekHeader,
            s.each(l, function(t, e) {
                r[t] = e(n)
            });
            var i = s.datepicker;
            i && (i.regional[e] = i.regional[t] = n,
            i.regional.en = i.regional[""],
            i.setDefaults(n))
        }
        ,
        o.locale = c,
        o.getMomentLocaleData = p,
        c("en", i.englishDefaults)
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(4);
        e.globalDefaults = {
            titleRangeSeparator: " – ",
            monthYearFormat: "MMMM YYYY",
            defaultTimedEventDuration: "01:00:00",
            defaultAllDayEventDuration: {
                days: 1
            },
            forceEventDuration: !1,
            nextDayThreshold: "09:00:00",
            columnHeader: !0,
            defaultView: "agendaWeek",
            aspectRatio: 1.35,
            header: {
                left: "title",
                center: "",
                right: "today prev,next"
            },
            weekends: !0,
            weekNumbers: !1,
            weekNumberTitle: "W",
            weekNumberCalculation: "local",
            scrollTime: "09:00:00",
            minTime: "07:00:00",
            maxTime: "19:00:00",
            showNonCurrentDates: !0,
            lazyFetching: !0,
            startParam: "start",
            endParam: "end",
            timezoneParam: "timezone",
            timezone: !1,
            locale: null,
            isRTL: !1,
            buttonText: {
                prev: "prev",
                next: "next",
                prevYear: "prev year",
                nextYear: "next year",
                year: "Año",
                today: "Hoy",
                month: "Mes",
                week: "Semana",
                day: "Día"
            },
            allDayText: "all-day",
            agendaEventMinHeight: 0,
            theme: !1,
            dragOpacity: .75,
            dragRevertDuration: 500,
            dragScroll: !0,
            unselectAuto: !0,
            dropAccept: "*",
            eventOrder: "title",
            eventLimit: !1,
            eventLimitText: "more",
            eventLimitClick: "popover",
            dayPopoverFormat: "LL",
            handleWindowResize: !0,
            windowResizeDelay: 100,
            longPressDelay: 1e3
        },
        e.englishDefaults = {
            dayPopoverFormat: "dddd, MMMM D"
        },
        e.rtlDefaults = {
            header: {
                left: "next,prev today",
                center: "",
                right: "title"
            },
            buttonIcons: {
                prev: "right-single-arrow",
                next: "left-single-arrow",
                prevYear: "right-double-arrow",
                nextYear: "left-double-arrow"
            },
            themeButtonIcons: {
                prev: "circle-triangle-e",
                next: "circle-triangle-w",
                nextYear: "seek-prev",
                prevYear: "seek-next"
            }
        };
        var i = ["header", "footer", "buttonText", "buttonIcons", "themeButtonIcons"];
        e.mergeOptions = function(t) {
            return r.mergeProps(t, i)
        }
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , i = n(4)
          , o = function() {
            function t() {}
            return t.extend = function(t) {
                var e = function(t) {
                    function e() {
                        return null !== t && t.apply(this, arguments) || this
                    }
                    return r.__extends(e, t),
                    e
                }(this);
                return i.copyOwnProps(t, e.prototype),
                e
            }
            ,
            t.mixin = function(t) {
                i.copyOwnProps(t, this.prototype)
            }
            ,
            t
        }();
        e.default = o
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(3)
          , i = n(208)
          , o = function() {
            function e(t) {
                this.source = t,
                this.className = [],
                this.miscProps = {}
            }
            return e.parse = function(t, e) {
                var n = new this(e);
                return !!n.applyProps(t) && n
            }
            ,
            e.normalizeId = function(t) {
                return String(t)
            }
            ,
            e.generateId = function() {
                return "_fc" + e.uuid++
            }
            ,
            e.prototype.clone = function() {
                var t = new this.constructor(this.source);
                return t.id = this.id,
                t.rawId = this.rawId,
                t.uid = this.uid,
                e.copyVerbatimStandardProps(this, t),
                t.className = this.className.slice(),
                t.miscProps = r.extend({}, this.miscProps),
                t
            }
            ,
            e.prototype.hasInverseRendering = function() {
                return "inverse-background" === this.getRendering()
            }
            ,
            e.prototype.hasBgRendering = function() {
                var t = this.getRendering();
                return "inverse-background" === t || "background" === t
            }
            ,
            e.prototype.getRendering = function() {
                return null != this.rendering ? this.rendering : this.source.rendering
            }
            ,
            e.prototype.getConstraint = function() {
                return null != this.constraint ? this.constraint : null != this.source.constraint ? this.source.constraint : this.source.calendar.opt("eventConstraint")
            }
            ,
            e.prototype.getOverlap = function() {
                return null != this.overlap ? this.overlap : null != this.source.overlap ? this.source.overlap : this.source.calendar.opt("eventOverlap")
            }
            ,
            e.prototype.isStartExplicitlyEditable = function() {
                return null != this.startEditable ? this.startEditable : this.source.startEditable
            }
            ,
            e.prototype.isDurationExplicitlyEditable = function() {
                return null != this.durationEditable ? this.durationEditable : this.source.durationEditable
            }
            ,
            e.prototype.isExplicitlyEditable = function() {
                return null != this.editable ? this.editable : this.source.editable
            }
            ,
            e.prototype.toLegacy = function() {
                var t = r.extend({}, this.miscProps);
                return t._id = this.uid,
                t.source = this.source,
                t.className = this.className.slice(),
                t.allDay = this.isAllDay(),
                null != this.rawId && (t.id = this.rawId),
                e.copyVerbatimStandardProps(this, t),
                t
            }
            ,
            e.prototype.applyManualStandardProps = function(t) {
                return null != t.id ? this.id = e.normalizeId(this.rawId = t.id) : this.id = e.generateId(),
                null != t._id ? this.uid = String(t._id) : this.uid = e.generateId(),
                r.isArray(t.className) && (this.className = t.className),
                "string" == typeof t.className && (this.className = t.className.split(/\s+/)),
                !0
            }
            ,
            e.prototype.applyMiscProps = function(t) {
                r.extend(this.miscProps, t)
            }
            ,
            e.uuid = 0,
            e.defineStandardProps = i.default.defineStandardProps,
            e.copyVerbatimStandardProps = i.default.copyVerbatimStandardProps,
            e
        }();
        e.default = o,
        i.default.mixInto(o),
        o.defineStandardProps({
            _id: !1,
            id: !1,
            className: !1,
            source: !1,
            title: !0,
            url: !0,
            rendering: !0,
            constraint: !0,
            overlap: !0,
            editable: !0,
            startEditable: !0,
            durationEditable: !0,
            color: !0,
            backgroundColor: !0,
            borderColor: !0,
            textColor: !0
        })
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(211)
          , i = n(36)
          , o = n(12);
        e.eventDefsToEventInstances = function(t, e) {
            var n, r = [];
            for (n = 0; n < t.length; n++)
                r.push.apply(r, t[n].buildInstances(e));
            return r
        }
        ,
        e.eventInstanceToEventRange = function(t) {
            return new r.default(t.dateProfile.unzonedRange,t.def,t)
        }
        ,
        e.eventRangeToEventFootprint = function(t) {
            return new i.default(new o.default(t.unzonedRange,t.eventDef.isAllDay()),t.eventDef,t.eventInstance)
        }
        ,
        e.eventInstanceToUnzonedRange = function(t) {
            return t.dateProfile.unzonedRange
        }
        ,
        e.eventFootprintToComponentFootprint = function(t) {
            return t.componentFootprint
        }
    }
    , function(t, e) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var n = function() {
            function t(t, e, n) {
                this.componentFootprint = t,
                this.eventDef = e,
                n && (this.eventInstance = n)
            }
            return t.prototype.getEventLegacy = function() {
                return (this.eventInstance || this.eventDef).toLegacy()
            }
            ,
            t
        }();
        e.default = n
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var g = n(4)
          , v = n(17)
          , y = n(34)
          , m = n(50)
          , r = n(13)
          , i = function() {
            function f() {}
            return f.createFromRawProps = function(t, e, n) {
                var r, i, o, s, a = t.def, l = {}, u = {}, d = {}, c = {}, p = null, h = null;
                for (r in e)
                    v.default.isStandardProp(r) ? l[r] = e[r] : a.isStandardProp(r) ? u[r] = e[r] : a.miscProps[r] !== e[r] && (d[r] = e[r]);
                return (i = v.default.parse(l, a.source)) && (o = m.default.createFromDiff(t.dateProfile, i, n)),
                u.id !== a.id && (p = u.id),
                g.isArraysEqual(u.className, a.className) || (h = u.className),
                y.default.copyVerbatimStandardProps(u, c),
                (s = new f).eventDefId = p,
                s.className = h,
                s.verbatimStandardProps = c,
                s.miscProps = d,
                o && (s.dateMutation = o),
                s
            }
            ,
            f.prototype.mutateSingle = function(t) {
                var e;
                return this.dateMutation && (e = t.dateProfile,
                t.dateProfile = this.dateMutation.buildNewDateProfile(e, t.source.calendar)),
                null != this.eventDefId && (t.id = y.default.normalizeId(t.rawId = this.eventDefId)),
                this.className && (t.className = this.className),
                this.verbatimStandardProps && r.default.copyVerbatimStandardProps(this.verbatimStandardProps, t),
                this.miscProps && t.applyMiscProps(this.miscProps),
                e ? function() {
                    t.dateProfile = e
                }
                : function() {}
            }
            ,
            f.prototype.setDateMutation = function(t) {
                t && !t.isEmpty() ? this.dateMutation = t : this.dateMutation = null
            }
            ,
            f.prototype.isEmpty = function() {
                return !this.dateMutation
            }
            ,
            f
        }();
        e.default = i
    }
    , function(t, e) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        }),
        e.default = {
            sourceClasses: [],
            registerClass: function(t) {
                this.sourceClasses.unshift(t)
            },
            parse: function(t, e) {
                var n, r, i = this.sourceClasses;
                for (n = 0; n < i.length; n++)
                    if (r = i[n].parse(t, e))
                        return r
            }
        }
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , i = n(3)
          , o = n(4)
          , s = function(n) {
            function t(t) {
                var e = n.call(this) || this;
                return t = t || {},
                e.overflowX = t.overflowX || t.overflow || "auto",
                e.overflowY = t.overflowY || t.overflow || "auto",
                e
            }
            return r.__extends(t, n),
            t.prototype.render = function() {
                this.el = this.renderEl(),
                this.applyOverflow()
            }
            ,
            t.prototype.renderEl = function() {
                return this.scrollEl = i('<div class="fc-scroller"></div>')
            }
            ,
            t.prototype.clear = function() {
                this.setHeight("auto"),
                this.applyOverflow()
            }
            ,
            t.prototype.destroy = function() {
                this.el.remove()
            }
            ,
            t.prototype.applyOverflow = function() {
                this.scrollEl.css({
                    "overflow-x": this.overflowX,
                    "overflow-y": this.overflowY
                })
            }
            ,
            t.prototype.lockOverflow = function(t) {
                var e = this.overflowX
                  , n = this.overflowY;
                t = t || this.getScrollbarWidths(),
                "auto" === e && (e = t.top || t.bottom || this.scrollEl[0].scrollWidth - 1 > this.scrollEl[0].clientWidth ? "scroll" : "hidden"),
                "auto" === n && (n = t.left || t.right || this.scrollEl[0].scrollHeight - 1 > this.scrollEl[0].clientHeight ? "scroll" : "hidden"),
                this.scrollEl.css({
                    "overflow-x": e,
                    "overflow-y": n
                })
            }
            ,
            t.prototype.setHeight = function(t) {
                this.scrollEl.height(t)
            }
            ,
            t.prototype.getScrollTop = function() {
                return this.scrollEl.scrollTop()
            }
            ,
            t.prototype.setScrollTop = function(t) {
                this.scrollEl.scrollTop(t)
            }
            ,
            t.prototype.getClientWidth = function() {
                return this.scrollEl[0].clientWidth
            }
            ,
            t.prototype.getClientHeight = function() {
                return this.scrollEl[0].clientHeight
            }
            ,
            t.prototype.getScrollbarWidths = function() {
                return o.getScrollbarWidths(this.scrollEl)
            }
            ,
            t
        }(n(33).default);
        e.default = s
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var i = n(2)
          , o = n(3)
          , s = n(4)
          , r = n(219)
          , a = n(21)
          , l = function(r) {
            function t(t, e) {
                var n = r.call(this, t, e) || this;
                return n.segSelector = ".fc-event-container > *",
                n.dateSelectingClass && (n.dateClicking = new n.dateClickingClass(n)),
                n.dateSelectingClass && (n.dateSelecting = new n.dateSelectingClass(n)),
                n.eventPointingClass && (n.eventPointing = new n.eventPointingClass(n)),
                n.eventDraggingClass && n.eventPointing && (n.eventDragging = new n.eventDraggingClass(n,n.eventPointing)),
                n.eventResizingClass && n.eventPointing && (n.eventResizing = new n.eventResizingClass(n,n.eventPointing)),
                n.externalDroppingClass && (n.externalDropping = new n.externalDroppingClass(n)),
                n
            }
            return i.__extends(t, r),
            t.prototype.setElement = function(t) {
                r.prototype.setElement.call(this, t),
                this.dateClicking && this.dateClicking.bindToEl(t),
                this.dateSelecting && this.dateSelecting.bindToEl(t),
                this.bindAllSegHandlersToEl(t)
            }
            ,
            t.prototype.removeElement = function() {
                this.endInteractions(),
                r.prototype.removeElement.call(this)
            }
            ,
            t.prototype.executeEventUnrender = function() {
                this.endInteractions(),
                r.prototype.executeEventUnrender.call(this)
            }
            ,
            t.prototype.bindGlobalHandlers = function() {
                r.prototype.bindGlobalHandlers.call(this),
                this.externalDropping && this.externalDropping.bindToDocument()
            }
            ,
            t.prototype.unbindGlobalHandlers = function() {
                r.prototype.unbindGlobalHandlers.call(this),
                this.externalDropping && this.externalDropping.unbindFromDocument()
            }
            ,
            t.prototype.bindDateHandlerToEl = function(t, e, n) {
                var r = this;
                this.el.on(e, function(t) {
                    if (!o(t.target).is(r.segSelector + ":not(.fc-helper)," + r.segSelector + ":not(.fc-helper) *,.fc-more,a[data-goto]"))
                        return n.call(r, t)
                })
            }
            ,
            t.prototype.bindAllSegHandlersToEl = function(e) {
                [this.eventPointing, this.eventDragging, this.eventResizing].forEach(function(t) {
                    t && t.bindToEl(e)
                })
            }
            ,
            t.prototype.bindSegHandlerToEl = function(t, e, r) {
                var i = this;
                t.on(e, this.segSelector, function(t) {
                    var e = o(t.currentTarget);
                    if (!e.is(".fc-helper")) {
                        var n = e.data("fc-seg");
                        if (n && !i.shouldIgnoreEventPointing())
                            return r.call(i, n, t)
                    }
                })
            }
            ,
            t.prototype.shouldIgnoreMouse = function() {
                return a.default.get().shouldIgnoreMouse()
            }
            ,
            t.prototype.shouldIgnoreTouch = function() {
                var t = this._getView();
                return t.isSelected || t.selectedEvent
            }
            ,
            t.prototype.shouldIgnoreEventPointing = function() {
                return this.eventDragging && this.eventDragging.isDragging || this.eventResizing && this.eventResizing.isResizing
            }
            ,
            t.prototype.canStartSelection = function(t, e) {
                return s.getEvIsTouch(e) && !this.canStartResize(t, e) && (this.isEventDefDraggable(t.footprint.eventDef) || this.isEventDefResizable(t.footprint.eventDef))
            }
            ,
            t.prototype.canStartDrag = function(t, e) {
                return !this.canStartResize(t, e) && this.isEventDefDraggable(t.footprint.eventDef)
            }
            ,
            t.prototype.canStartResize = function(t, e) {
                var n = this._getView()
                  , r = t.footprint.eventDef;
                return (!s.getEvIsTouch(e) || n.isEventDefSelected(r)) && this.isEventDefResizable(r) && o(e.target).is(".fc-resizer")
            }
            ,
            t.prototype.endInteractions = function() {
                [this.dateClicking, this.dateSelecting, this.eventPointing, this.eventDragging, this.eventResizing].forEach(function(t) {
                    t && t.end()
                })
            }
            ,
            t.prototype.isEventDefDraggable = function(t) {
                return this.isEventDefStartEditable(t)
            }
            ,
            t.prototype.isEventDefStartEditable = function(t) {
                var e = t.isStartExplicitlyEditable();
                return null == e && null == (e = this.opt("eventStartEditable")) && (e = this.isEventDefGenerallyEditable(t)),
                e
            }
            ,
            t.prototype.isEventDefGenerallyEditable = function(t) {
                var e = t.isExplicitlyEditable();
                return null == e && (e = this.opt("editable")),
                e
            }
            ,
            t.prototype.isEventDefResizableFromStart = function(t) {
                return this.opt("eventResizableFromStart") && this.isEventDefResizable(t)
            }
            ,
            t.prototype.isEventDefResizableFromEnd = function(t) {
                return this.isEventDefResizable(t)
            }
            ,
            t.prototype.isEventDefResizable = function(t) {
                var e = t.isDurationExplicitlyEditable();
                return null == e && null == (e = this.opt("eventDurationEditable")) && (e = this.isEventDefGenerallyEditable(t)),
                e
            }
            ,
            t.prototype.diffDates = function(t, e) {
                return this.largeUnit ? s.diffByUnit(t, e, this.largeUnit) : s.diffDayTime(t, e)
            }
            ,
            t.prototype.isEventInstanceGroupAllowed = function(t) {
                var e, n = this._getView(), r = this.dateProfile, i = this.eventRangesToEventFootprints(t.getAllEventRanges());
                for (e = 0; e < i.length; e++)
                    if (!r.validUnzonedRange.containsRange(i[e].componentFootprint.unzonedRange))
                        return !1;
                return n.calendar.constraints.isEventInstanceGroupAllowed(t)
            }
            ,
            t.prototype.isExternalInstanceGroupAllowed = function(t) {
                var e, n = this._getView(), r = this.dateProfile, i = this.eventRangesToEventFootprints(t.getAllEventRanges());
                for (e = 0; e < i.length; e++)
                    if (!r.validUnzonedRange.containsRange(i[e].componentFootprint.unzonedRange))
                        return !1;
                for (e = 0; e < i.length; e++)
                    if (!n.calendar.constraints.isSelectionFootprintAllowed(i[e].componentFootprint))
                        return !1;
                return !0
            }
            ,
            t
        }(r.default);
        e.default = l
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var i = n(2)
          , o = n(3)
          , s = n(0)
          , a = n(4)
          , l = n(218)
          , r = n(221)
          , u = n(40)
          , d = n(21)
          , c = n(5)
          , p = function(r) {
            function t(t, e) {
                var n = r.call(this, null, e.options) || this;
                return n.batchRenderDepth = 0,
                n.isSelected = !1,
                n.calendar = t,
                n.viewSpec = e,
                n.type = e.type,
                n.name = n.type,
                n.initRenderQueue(),
                n.initHiddenDays(),
                n.dateProfileGenerator = new n.dateProfileGeneratorClass(n),
                n.bindBaseRenderHandlers(),
                n.eventOrderSpecs = a.parseFieldSpecs(n.opt("eventOrder")),
                n.initialize && n.initialize(),
                n
            }
            return i.__extends(t, r),
            t.prototype._getView = function() {
                return this
            }
            ,
            t.prototype.opt = function(t) {
                return this.options[t]
            }
            ,
            t.prototype.initRenderQueue = function() {
                this.renderQueue = new l.default({
                    event: this.opt("eventRenderWait")
                }),
                this.renderQueue.on("start", this.onRenderQueueStart.bind(this)),
                this.renderQueue.on("stop", this.onRenderQueueStop.bind(this)),
                this.on("before:change", this.startBatchRender),
                this.on("change", this.stopBatchRender)
            }
            ,
            t.prototype.onRenderQueueStart = function() {
                this.calendar.freezeContentHeight(),
                this.addScroll(this.queryScroll())
            }
            ,
            t.prototype.onRenderQueueStop = function() {
                this.calendar.updateViewSize() && this.popScroll(),
                this.calendar.thawContentHeight()
            }
            ,
            t.prototype.startBatchRender = function() {
                this.batchRenderDepth++ || this.renderQueue.pause()
            }
            ,
            t.prototype.stopBatchRender = function() {
                --this.batchRenderDepth || this.renderQueue.resume()
            }
            ,
            t.prototype.requestRender = function(t, e, n) {
                this.renderQueue.queue(t, e, n)
            }
            ,
            t.prototype.whenSizeUpdated = function(t) {
                this.renderQueue.isRunning ? this.renderQueue.one("stop", t.bind(this)) : t.call(this)
            }
            ,
            t.prototype.computeTitle = function(t) {
                var e;
                return e = /^(year|month)$/.test(t.currentRangeUnit) ? t.currentUnzonedRange : t.activeUnzonedRange,
                this.formatRange({
                    start: this.calendar.msToMoment(e.startMs, t.isRangeAllDay),
                    end: this.calendar.msToMoment(e.endMs, t.isRangeAllDay)
                }, t.isRangeAllDay, this.opt("titleFormat") || this.computeTitleFormat(t), this.opt("titleRangeSeparator"))
            }
            ,
            t.prototype.computeTitleFormat = function(t) {
                var e = t.currentRangeUnit;
                return "year" === e ? "YYYY" : "month" === e ? this.opt("monthYearFormat") : 1 < t.currentUnzonedRange.as("days") ? "ll" : "LL"
            }
            ,
            t.prototype.setDate = function(t) {
                var e = this.get("dateProfile")
                  , n = this.dateProfileGenerator.build(t, void 0, !0);
                e && e.activeUnzonedRange.equals(n.activeUnzonedRange) || this.set("dateProfile", n)
            }
            ,
            t.prototype.unsetDate = function() {
                this.unset("dateProfile")
            }
            ,
            t.prototype.fetchInitialEvents = function(t) {
                var e = this.calendar
                  , n = t.isRangeAllDay && !this.usesMinMaxTime;
                return e.requestEvents(e.msToMoment(t.activeUnzonedRange.startMs, n), e.msToMoment(t.activeUnzonedRange.endMs, n))
            }
            ,
            t.prototype.bindEventChanges = function() {
                this.listenTo(this.calendar, "eventsReset", this.resetEvents)
            }
            ,
            t.prototype.unbindEventChanges = function() {
                this.stopListeningTo(this.calendar, "eventsReset")
            }
            ,
            t.prototype.setEvents = function(t) {
                this.set("currentEvents", t),
                this.set("hasEvents", !0)
            }
            ,
            t.prototype.unsetEvents = function() {
                this.unset("currentEvents"),
                this.unset("hasEvents")
            }
            ,
            t.prototype.resetEvents = function(t) {
                this.startBatchRender(),
                this.unsetEvents(),
                this.setEvents(t),
                this.stopBatchRender()
            }
            ,
            t.prototype.requestDateRender = function(t) {
                var e = this;
                this.requestRender(function() {
                    e.executeDateRender(t)
                }, "date", "init")
            }
            ,
            t.prototype.requestDateUnrender = function() {
                var t = this;
                this.requestRender(function() {
                    t.executeDateUnrender()
                }, "date", "destroy")
            }
            ,
            t.prototype.executeDateRender = function(t) {
                r.prototype.executeDateRender.call(this, t),
                this.render && this.render(),
                this.trigger("datesRendered"),
                this.addScroll({
                    isDateInit: !0
                }),
                this.startNowIndicator()
            }
            ,
            t.prototype.executeDateUnrender = function() {
                this.unselect(),
                this.stopNowIndicator(),
                this.trigger("before:datesUnrendered"),
                this.destroy && this.destroy(),
                r.prototype.executeDateUnrender.call(this)
            }
            ,
            t.prototype.bindBaseRenderHandlers = function() {
                var t = this;
                this.on("datesRendered", function() {
                    t.whenSizeUpdated(t.triggerViewRender)
                }),
                this.on("before:datesUnrendered", function() {
                    t.triggerViewDestroy()
                })
            }
            ,
            t.prototype.triggerViewRender = function() {
                this.publiclyTrigger("viewRender", {
                    context: this,
                    args: [this, this.el]
                })
            }
            ,
            t.prototype.triggerViewDestroy = function() {
                this.publiclyTrigger("viewDestroy", {
                    context: this,
                    args: [this, this.el]
                })
            }
            ,
            t.prototype.requestEventsRender = function(t) {
                var e = this;
                this.requestRender(function() {
                    e.executeEventRender(t),
                    e.whenSizeUpdated(e.triggerAfterEventsRendered)
                }, "event", "init")
            }
            ,
            t.prototype.requestEventsUnrender = function() {
                var t = this;
                this.requestRender(function() {
                    t.triggerBeforeEventsDestroyed(),
                    t.executeEventUnrender()
                }, "event", "destroy")
            }
            ,
            t.prototype.requestBusinessHoursRender = function(t) {
                var e = this;
                this.requestRender(function() {
                    e.renderBusinessHours(t)
                }, "businessHours", "init")
            }
            ,
            t.prototype.requestBusinessHoursUnrender = function() {
                var t = this;
                this.requestRender(function() {
                    t.unrenderBusinessHours()
                }, "businessHours", "destroy")
            }
            ,
            t.prototype.bindGlobalHandlers = function() {
                r.prototype.bindGlobalHandlers.call(this),
                this.listenTo(d.default.get(), {
                    touchstart: this.processUnselect,
                    mousedown: this.handleDocumentMousedown
                })
            }
            ,
            t.prototype.unbindGlobalHandlers = function() {
                r.prototype.unbindGlobalHandlers.call(this),
                this.stopListeningTo(d.default.get())
            }
            ,
            t.prototype.startNowIndicator = function() {
                var t, e, n, r = this;
                this.opt("nowIndicator") && (t = this.getNowIndicatorUnit()) && (e = a.proxy(this, "updateNowIndicator"),
                this.initialNowDate = this.calendar.getNow(),
                this.initialNowQueriedMs = (new Date).valueOf(),
                n = this.initialNowDate.clone().startOf(t).add(1, t).valueOf() - this.initialNowDate.valueOf(),
                this.nowIndicatorTimeoutID = setTimeout(function() {
                    r.nowIndicatorTimeoutID = null,
                    e(),
                    n = +s.duration(1, t),
                    n = Math.max(100, n),
                    r.nowIndicatorIntervalID = setInterval(e, n)
                }, n))
            }
            ,
            t.prototype.updateNowIndicator = function() {
                this.isDatesRendered && this.initialNowDate && (this.unrenderNowIndicator(),
                this.renderNowIndicator(this.initialNowDate.clone().add((new Date).valueOf() - this.initialNowQueriedMs)),
                this.isNowIndicatorRendered = !0)
            }
            ,
            t.prototype.stopNowIndicator = function() {
                this.isNowIndicatorRendered && (this.nowIndicatorTimeoutID && (clearTimeout(this.nowIndicatorTimeoutID),
                this.nowIndicatorTimeoutID = null),
                this.nowIndicatorIntervalID && (clearInterval(this.nowIndicatorIntervalID),
                this.nowIndicatorIntervalID = null),
                this.unrenderNowIndicator(),
                this.isNowIndicatorRendered = !1)
            }
            ,
            t.prototype.updateSize = function(t, e, n) {
                this.setHeight ? this.setHeight(t, e) : r.prototype.updateSize.call(this, t, e, n),
                this.updateNowIndicator()
            }
            ,
            t.prototype.addScroll = function(t) {
                var e = this.queuedScroll || (this.queuedScroll = {});
                o.extend(e, t)
            }
            ,
            t.prototype.popScroll = function() {
                this.applyQueuedScroll(),
                this.queuedScroll = null
            }
            ,
            t.prototype.applyQueuedScroll = function() {
                this.queuedScroll && this.applyScroll(this.queuedScroll)
            }
            ,
            t.prototype.queryScroll = function() {
                var t = {};
                return this.isDatesRendered && o.extend(t, this.queryDateScroll()),
                t
            }
            ,
            t.prototype.applyScroll = function(t) {
                t.isDateInit && this.isDatesRendered && o.extend(t, this.computeInitialDateScroll()),
                this.isDatesRendered && this.applyDateScroll(t)
            }
            ,
            t.prototype.computeInitialDateScroll = function() {
                return {}
            }
            ,
            t.prototype.queryDateScroll = function() {
                return {}
            }
            ,
            t.prototype.applyDateScroll = function(t) {}
            ,
            t.prototype.reportEventDrop = function(t, e, n, r) {
                var i = this.calendar.eventManager.mutateEventsWithId(t.def.id, e)
                  , o = e.dateMutation;
                o && (t.dateProfile = o.buildNewDateProfile(t.dateProfile, this.calendar)),
                this.triggerEventDrop(t, o && o.dateDelta || s.duration(), i, n, r)
            }
            ,
            t.prototype.triggerEventDrop = function(t, e, n, r, i) {
                this.publiclyTrigger("eventDrop", {
                    context: r[0],
                    args: [t.toLegacy(), e, n, i, {}, this]
                })
            }
            ,
            t.prototype.reportExternalDrop = function(t, e, n, r, i, o) {
                e && this.calendar.eventManager.addEventDef(t, n),
                this.triggerExternalDrop(t, e, r, i, o)
            }
            ,
            t.prototype.triggerExternalDrop = function(t, e, n, r, i) {
                this.publiclyTrigger("drop", {
                    context: n[0],
                    args: [t.dateProfile.start.clone(), r, i, this]
                }),
                e && this.publiclyTrigger("eventReceive", {
                    context: this,
                    args: [t.buildInstance().toLegacy(), this]
                })
            }
            ,
            t.prototype.reportEventResize = function(t, e, n, r) {
                var i = this.calendar.eventManager.mutateEventsWithId(t.def.id, e);
                t.dateProfile = e.dateMutation.buildNewDateProfile(t.dateProfile, this.calendar),
                this.triggerEventResize(t, e.dateMutation.endDelta, i, n, r)
            }
            ,
            t.prototype.triggerEventResize = function(t, e, n, r, i) {
                this.publiclyTrigger("eventResize", {
                    context: r[0],
                    args: [t.toLegacy(), e, n, i, {}, this]
                })
            }
            ,
            t.prototype.select = function(t, e) {
                this.unselect(e),
                this.renderSelectionFootprint(t),
                this.reportSelection(t, e)
            }
            ,
            t.prototype.renderSelectionFootprint = function(t) {
                this.renderSelection ? this.renderSelection(t.toLegacy(this.calendar)) : r.prototype.renderSelectionFootprint.call(this, t)
            }
            ,
            t.prototype.reportSelection = function(t, e) {
                this.isSelected = !0,
                this.triggerSelect(t, e)
            }
            ,
            t.prototype.triggerSelect = function(t, e) {
                var n = this.calendar.footprintToDateProfile(t);
                this.publiclyTrigger("select", {
                    context: this,
                    args: [n.start, n.end, e, this]
                })
            }
            ,
            t.prototype.unselect = function(t) {
                this.isSelected && (this.isSelected = !1,
                this.destroySelection && this.destroySelection(),
                this.unrenderSelection(),
                this.publiclyTrigger("unselect", {
                    context: this,
                    args: [t, this]
                }))
            }
            ,
            t.prototype.selectEventInstance = function(e) {
                this.selectedEventInstance && this.selectedEventInstance === e || (this.unselectEventInstance(),
                this.getEventSegs().forEach(function(t) {
                    t.footprint.eventInstance === e && t.el && t.el.addClass("fc-selected")
                }),
                this.selectedEventInstance = e)
            }
            ,
            t.prototype.unselectEventInstance = function() {
                this.selectedEventInstance && (this.getEventSegs().forEach(function(t) {
                    t.el && t.el.removeClass("fc-selected")
                }),
                this.selectedEventInstance = null)
            }
            ,
            t.prototype.isEventDefSelected = function(t) {
                return this.selectedEventInstance && this.selectedEventInstance.def.id === t.id
            }
            ,
            t.prototype.handleDocumentMousedown = function(t) {
                a.isPrimaryMouseButton(t) && this.processUnselect(t)
            }
            ,
            t.prototype.processUnselect = function(t) {
                this.processRangeUnselect(t),
                this.processEventUnselect(t)
            }
            ,
            t.prototype.processRangeUnselect = function(t) {
                var e;
                this.isSelected && this.opt("unselectAuto") && ((e = this.opt("unselectCancel")) && o(t.target).closest(e).length || this.unselect(t))
            }
            ,
            t.prototype.processEventUnselect = function(t) {
                this.selectedEventInstance && (o(t.target).closest(".fc-selected").length || this.unselectEventInstance())
            }
            ,
            t.prototype.triggerBaseRendered = function() {
                this.publiclyTrigger("viewRender", {
                    context: this,
                    args: [this, this.el]
                })
            }
            ,
            t.prototype.triggerBaseUnrendered = function() {
                this.publiclyTrigger("viewDestroy", {
                    context: this,
                    args: [this, this.el]
                })
            }
            ,
            t.prototype.triggerDayClick = function(t, e, n) {
                var r = this.calendar.footprintToDateProfile(t);
                this.publiclyTrigger("dayClick", {
                    context: e,
                    args: [r.start, n, this]
                })
            }
            ,
            t.prototype.isDateInOtherMonth = function(t, e) {
                return !1
            }
            ,
            t.prototype.getUnzonedRangeOption = function(t) {
                var e = this.opt(t);
                if ("function" == typeof e && (e = e.apply(null, Array.prototype.slice.call(arguments, 1))),
                e)
                    return this.calendar.parseUnzonedRange(e)
            }
            ,
            t.prototype.initHiddenDays = function() {
                var t, e = this.opt("hiddenDays") || [], n = [], r = 0;
                for (!1 === this.opt("weekends") && e.push(0, 6),
                t = 0; t < 7; t++)
                    (n[t] = -1 !== o.inArray(t, e)) || r++;
                if (!r)
                    throw new Error("invalid hiddenDays");
                this.isHiddenDayHash = n
            }
            ,
            t.prototype.trimHiddenDays = function(t) {
                var e = t.getStart()
                  , n = t.getEnd();
                return e && (e = this.skipHiddenDays(e)),
                n && (n = this.skipHiddenDays(n, -1, !0)),
                null === e || null === n || e < n ? new c.default(e,n) : null
            }
            ,
            t.prototype.isHiddenDay = function(t) {
                return s.isMoment(t) && (t = t.day()),
                this.isHiddenDayHash[t]
            }
            ,
            t.prototype.skipHiddenDays = function(t, e, n) {
                void 0 === e && (e = 1),
                void 0 === n && (n = !1);
                for (var r = t.clone(); this.isHiddenDayHash[(r.day() + (n ? e : 0) + 7) % 7]; )
                    r.add(e, "days");
                return r
            }
            ,
            t
        }(u.default);
        (e.default = p).prototype.usesMinMaxTime = !1,
        p.prototype.dateProfileGeneratorClass = r.default,
        p.watch("displayingDates", ["isInDom", "dateProfile"], function(t) {
            this.requestDateRender(t.dateProfile)
        }, function() {
            this.requestDateUnrender()
        }),
        p.watch("displayingBusinessHours", ["displayingDates", "businessHourGenerator"], function(t) {
            this.requestBusinessHoursRender(t.businessHourGenerator)
        }, function() {
            this.requestBusinessHoursUnrender()
        }),
        p.watch("initialEvents", ["dateProfile"], function(t) {
            return this.fetchInitialEvents(t.dateProfile)
        }),
        p.watch("bindingEvents", ["initialEvents"], function(t) {
            this.setEvents(t.initialEvents),
            this.bindEventChanges()
        }, function() {
            this.unbindEventChanges(),
            this.unsetEvents()
        }),
        p.watch("displayingEvents", ["displayingDates", "hasEvents"], function() {
            this.requestEventsRender(this.get("currentEvents"))
        }, function() {
            this.requestEventsUnrender()
        }),
        p.watch("title", ["dateProfile"], function(t) {
            return this.title = this.computeTitle(t.dateProfile)
        }),
        p.watch("legacyDateProps", ["dateProfile"], function(t) {
            var e = this.calendar
              , n = t.dateProfile;
            this.start = e.msToMoment(n.activeUnzonedRange.startMs, n.isRangeAllDay),
            this.end = e.msToMoment(n.activeUnzonedRange.endMs, n.isRangeAllDay),
            this.intervalStart = e.msToMoment(n.currentUnzonedRange.startMs, n.isRangeAllDay),
            this.intervalEnd = e.msToMoment(n.currentUnzonedRange.endMs, n.isRangeAllDay)
        })
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var l = n(3)
          , u = n(4)
          , r = function() {
            function t(t, e) {
                this.view = t._getView(),
                this.component = t,
                this.fillRenderer = e
            }
            return t.prototype.opt = function(t) {
                return this.view.opt(t)
            }
            ,
            t.prototype.rangeUpdated = function() {
                var t, e;
                this.eventTimeFormat = this.opt("eventTimeFormat") || this.opt("timeFormat") || this.computeEventTimeFormat(),
                null == (t = this.opt("displayEventTime")) && (t = this.computeDisplayEventTime()),
                null == (e = this.opt("displayEventEnd")) && (e = this.computeDisplayEventEnd()),
                this.displayEventTime = t,
                this.displayEventEnd = e
            }
            ,
            t.prototype.render = function(t) {
                var e, n, r, i = this.component._getDateProfile(), o = [], s = [];
                for (e in t)
                    r = (n = t[e]).sliceRenderRanges(i.activeUnzonedRange),
                    n.getEventDef().hasBgRendering() ? o.push.apply(o, r) : s.push.apply(s, r);
                this.renderBgRanges(o),
                this.renderFgRanges(s)
            }
            ,
            t.prototype.unrender = function() {
                this.unrenderBgRanges(),
                this.unrenderFgRanges()
            }
            ,
            t.prototype.renderFgRanges = function(t) {
                var e = this.component.eventRangesToEventFootprints(t)
                  , n = this.component.eventFootprintsToSegs(e);
                n = this.renderFgSegEls(n),
                !1 !== this.renderFgSegs(n) && (this.fgSegs = n)
            }
            ,
            t.prototype.unrenderFgRanges = function() {
                this.unrenderFgSegs(this.fgSegs || []),
                this.fgSegs = null
            }
            ,
            t.prototype.renderBgRanges = function(t) {
                var e = this.component.eventRangesToEventFootprints(t)
                  , n = this.component.eventFootprintsToSegs(e);
                !1 !== this.renderBgSegs(n) && (this.bgSegs = n)
            }
            ,
            t.prototype.unrenderBgRanges = function() {
                this.unrenderBgSegs(),
                this.bgSegs = null
            }
            ,
            t.prototype.getSegs = function() {
                return (this.bgSegs || []).concat(this.fgSegs || [])
            }
            ,
            t.prototype.renderFgSegs = function(t) {
                return !1
            }
            ,
            t.prototype.unrenderFgSegs = function(t) {}
            ,
            t.prototype.renderBgSegs = function(t) {
                var n = this;
                if (!this.fillRenderer)
                    return !1;
                this.fillRenderer.renderSegs("bgEvent", t, {
                    getClasses: function(t) {
                        return n.getBgClasses(t.footprint.eventDef)
                    },
                    getCss: function(t) {
                        return {
                            "background-color": n.getBgColor(t.footprint.eventDef)
                        }
                    },
                    filterEl: function(t, e) {
                        return n.filterEventRenderEl(t.footprint, e)
                    }
                })
            }
            ,
            t.prototype.unrenderBgSegs = function() {
                this.fillRenderer && this.fillRenderer.unrender("bgEvent")
            }
            ,
            t.prototype.renderFgSegEls = function(i, t) {
                var o = this;
                void 0 === t && (t = !1);
                var e, s = this.view.hasPublicHandlers("eventRender"), n = "", a = [];
                if (i.length) {
                    for (e = 0; e < i.length; e++)
                        this.beforeFgSegHtml(i[e]),
                        n += this.fgSegHtml(i[e], t);
                    l(n).each(function(t, e) {
                        var n = i[t]
                          , r = l(e);
                        s && (r = o.filterEventRenderEl(n.footprint, r)),
                        r && (r.data("fc-seg", n),
                        n.el = r,
                        a.push(n))
                    })
                }
                return a
            }
            ,
            t.prototype.beforeFgSegHtml = function(t) {}
            ,
            t.prototype.fgSegHtml = function(t, e) {}
            ,
            t.prototype.getSegClasses = function(t, e, n) {
                var r = ["fc-event", t.isStart ? "fc-start" : "fc-not-start", t.isEnd ? "fc-end" : "fc-not-end"].concat(this.getClasses(t.footprint.eventDef));
                return e && r.push("fc-draggable"),
                n && r.push("fc-resizable"),
                this.view.isEventDefSelected(t.footprint.eventDef) && r.push("fc-selected"),
                r
            }
            ,
            t.prototype.filterEventRenderEl = function(t, e) {
                var n = t.getEventLegacy()
                  , r = this.view.publiclyTrigger("eventRender", {
                    context: n,
                    args: [n, e, this.view]
                });
                return !1 === r ? e = null : r && !0 !== r && (e = l(r)),
                e
            }
            ,
            t.prototype.getTimeText = function(t, e, n) {
                return this._getTimeText(t.eventInstance.dateProfile.start, t.eventInstance.dateProfile.end, t.componentFootprint.isAllDay, e, n)
            }
            ,
            t.prototype._getTimeText = function(t, e, n, r, i) {
                return null == r && (r = this.eventTimeFormat),
                null == i && (i = this.displayEventEnd),
                this.displayEventTime && !n ? i && e ? this.view.formatRange({
                    start: t,
                    end: e
                }, !1, r) : t.format(r) : ""
            }
            ,
            t.prototype.computeEventTimeFormat = function() {
                return this.opt("smallTimeFormat")
            }
            ,
            t.prototype.computeDisplayEventTime = function() {
                return !0
            }
            ,
            t.prototype.computeDisplayEventEnd = function() {
                return !0
            }
            ,
            t.prototype.getBgClasses = function(t) {
                var e = this.getClasses(t);
                return e.push("fc-bgevent"),
                e
            }
            ,
            t.prototype.getClasses = function(t) {
                var e, n = this.getStylingObjs(t), r = [];
                for (e = 0; e < n.length; e++)
                    r.push.apply(r, n[e].eventClassName || n[e].className || []);
                return r
            }
            ,
            t.prototype.getSkinCss = function(t) {
                return {
                    "background-color": this.getBgColor(t),
                    "border-color": this.getBorderColor(t),
                    color: this.getTextColor(t)
                }
            }
            ,
            t.prototype.getBgColor = function(t) {
                var e, n, r = this.getStylingObjs(t);
                for (e = 0; e < r.length && !n; e++)
                    n = r[e].eventBackgroundColor || r[e].eventColor || r[e].backgroundColor || r[e].color;
                return n || (n = this.opt("eventBackgroundColor") || this.opt("eventColor")),
                n
            }
            ,
            t.prototype.getBorderColor = function(t) {
                var e, n, r = this.getStylingObjs(t);
                for (e = 0; e < r.length && !n; e++)
                    n = r[e].eventBorderColor || r[e].eventColor || r[e].borderColor || r[e].color;
                return n || (n = this.opt("eventBorderColor") || this.opt("eventColor")),
                n
            }
            ,
            t.prototype.getTextColor = function(t) {
                var e, n, r = this.getStylingObjs(t);
                for (e = 0; e < r.length && !n; e++)
                    n = r[e].eventTextColor || r[e].textColor;
                return n || (n = this.opt("eventTextColor")),
                n
            }
            ,
            t.prototype.getStylingObjs = function(t) {
                var e = this.getFallbackStylingObjs(t);
                return e.unshift(t),
                e
            }
            ,
            t.prototype.getFallbackStylingObjs = function(t) {
                return [t.source]
            }
            ,
            t.prototype.sortEventSegs = function(t) {
                t.sort(u.proxy(this, "compareEventSegs"))
            }
            ,
            t.prototype.compareEventSegs = function(t, e) {
                var n = t.footprint
                  , r = e.footprint
                  , i = n.componentFootprint
                  , o = r.componentFootprint
                  , s = i.unzonedRange
                  , a = o.unzonedRange;
                return s.startMs - a.startMs || a.endMs - a.startMs - (s.endMs - s.startMs) || o.isAllDay - i.isAllDay || u.compareByFieldSpecs(n.eventDef, r.eventDef, this.view.eventOrderSpecs, n.eventDef.miscProps, r.eventDef.miscProps)
            }
            ,
            t
        }();
        e.default = r
    }
    , , , , , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var s = n(10);
        function r(t) {
            return "en" !== t.locale() ? t.clone().locale("en") : t
        }
        s.newMomentProto.format = function() {
            return this._fullCalendar && arguments[0] ? c(this, arguments[0]) : this._ambigTime ? s.oldMomentFormat(r(this), "YYYY-MM-DD") : this._ambigZone ? s.oldMomentFormat(r(this), "YYYY-MM-DD[T]HH:mm:ss") : this._fullCalendar ? s.oldMomentFormat(r(this)) : s.oldMomentProto.format.apply(this, arguments)
        }
        ,
        s.newMomentProto.toISOString = function() {
            return this._ambigTime ? s.oldMomentFormat(r(this), "YYYY-MM-DD") : this._ambigZone ? s.oldMomentFormat(r(this), "YYYY-MM-DD[T]HH:mm:ss") : this._fullCalendar ? s.oldMomentProto.toISOString.apply(r(this), arguments) : s.oldMomentProto.toISOString.apply(this, arguments)
        }
        ;
        var a = "\v"
          , l = ""
          , o = ""
          , i = new RegExp(o + "([^" + o + "]*)" + o,"g")
          , u = {
            t: function(t) {
                return s.oldMomentFormat(t, "a").charAt(0)
            },
            T: function(t) {
                return s.oldMomentFormat(t, "A").charAt(0)
            }
        }
          , d = {
            Y: {
                value: 1,
                unit: "year"
            },
            M: {
                value: 2,
                unit: "month"
            },
            W: {
                value: 3,
                unit: "week"
            },
            w: {
                value: 3,
                unit: "week"
            },
            D: {
                value: 4,
                unit: "day"
            },
            d: {
                value: 4,
                unit: "day"
            }
        };
        function c(t, e) {
            return b(m(h(e).fakeFormatString, t).join(""))
        }
        e.formatDate = c,
        e.formatRange = function(t, e, n, r, i) {
            return t = s.default.parseZone(t),
            e = s.default.parseZone(e),
            function(t, e, n, r, i) {
                var o, s, a, l = t.sameUnits, u = e.clone().stripZone(), d = n.clone().stripZone(), c = m(t.fakeFormatString, e), p = m(t.fakeFormatString, n), h = "", f = "", g = "", v = "", y = "";
                for (o = 0; o < l.length && (!l[o] || u.isSame(d, l[o])); o++)
                    h += c[o];
                for (s = l.length - 1; o < s && (!l[s] || u.isSame(d, l[s])) && (s - 1 !== o || "." !== c[s]); s--)
                    f = c[s] + f;
                for (a = o; a <= s; a++)
                    g += c[a],
                    v += p[a];
                return (g || v) && (y = i ? v + r + g : g + r + v),
                b(h + y + f)
            }(h(n = t.localeData().longDateFormat(n) || n), t, e, r || " - ", i)
        }
        ;
        var p = {};
        function h(t) {
            return p[t] || (p[t] = {
                fakeFormatString: function t(e) {
                    var n, r, i = [];
                    for (n = 0; n < e.length; n++)
                        "string" == typeof (r = e[n]) ? i.push("[" + r + "]") : r.token ? r.token in u ? i.push(l + "[" + r.token + "]") : i.push(r.token) : r.maybe && i.push(o + t(r.maybe) + o);
                    return i.join(a)
                }(e = f(t)),
                sameUnits: function t(e) {
                    var n, r, i, o = [];
                    for (n = 0; n < e.length; n++)
                        (r = e[n]).token ? (i = d[r.token.charAt(0)],
                        o.push(i ? i.unit : "second")) : r.maybe ? o.push.apply(o, t(r.maybe)) : o.push(null);
                    return o
                }(e)
            });
            var e
        }
        function f(t) {
            for (var e, n = [], r = /\[([^\]]*)\]|\(([^\)]*)\)|(LTS|LT|(\w)\4*o?)|([^\w\[\(]+)/g; e = r.exec(t); )
                e[1] ? n.push.apply(n, g(e[1])) : e[2] ? n.push({
                    maybe: f(e[2])
                }) : e[3] ? n.push({
                    token: e[3]
                }) : e[5] && n.push.apply(n, g(e[5]));
            return n
        }
        function g(t) {
            return ". " === t ? [".", " "] : [t]
        }
        function m(t, e) {
            var n, r, i = [], o = s.oldMomentFormat(e, t).split(a);
            for (n = 0; n < o.length; n++)
                (r = o[n]).charAt(0) === l ? i.push(u[r.substring(1)](e)) : i.push(r);
            return i
        }
        function b(t) {
            return t.replace(i, function(t, e) {
                return e.match(/[1-9]/) ? e : ""
            })
        }
        e.queryMostGranularFormatUnit = function(t) {
            var e, n, r, i, o = f(t);
            for (e = 0; e < o.length; e++)
                (n = o[e]).token && (r = d[n.token.charAt(0)]) && (!i || r.value > i.value) && (i = r);
            return i ? i.unit : null
        }
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , i = n(33)
          , o = n(11)
          , s = n(7)
          , a = function(e) {
            function t() {
                var t = e.call(this) || this;
                return t._watchers = {},
                t._props = {},
                t.applyGlobalWatchers(),
                t.constructed(),
                t
            }
            return r.__extends(t, e),
            t.watch = function(t) {
                for (var e = [], n = 1; n < arguments.length; n++)
                    e[n - 1] = arguments[n];
                this.prototype.hasOwnProperty("_globalWatchArgs") || (this.prototype._globalWatchArgs = Object.create(this.prototype._globalWatchArgs)),
                this.prototype._globalWatchArgs[t] = e
            }
            ,
            t.prototype.constructed = function() {}
            ,
            t.prototype.applyGlobalWatchers = function() {
                var t, e = this._globalWatchArgs;
                for (t in e)
                    this.watch.apply(this, [t].concat(e[t]))
            }
            ,
            t.prototype.has = function(t) {
                return t in this._props
            }
            ,
            t.prototype.get = function(t) {
                return void 0 === t ? this._props : this._props[t]
            }
            ,
            t.prototype.set = function(t, e) {
                var n;
                "string" == typeof t ? (n = {})[t] = void 0 === e ? null : e : n = t,
                this.setProps(n)
            }
            ,
            t.prototype.reset = function(t) {
                var e, n = this._props, r = {};
                for (e in n)
                    r[e] = void 0;
                for (e in t)
                    r[e] = t[e];
                this.setProps(r)
            }
            ,
            t.prototype.unset = function(t) {
                var e, n, r = {};
                for (e = "string" == typeof t ? [t] : t,
                n = 0; n < e.length; n++)
                    r[e[n]] = void 0;
                this.setProps(r)
            }
            ,
            t.prototype.setProps = function(t) {
                var e, n, r = {}, i = 0;
                for (e in t)
                    "object" != typeof (n = t[e]) && n === this._props[e] || (r[e] = n,
                    i++);
                if (i) {
                    for (e in this.trigger("before:batchChange", r),
                    r)
                        n = r[e],
                        this.trigger("before:change", e, n),
                        this.trigger("before:change:" + e, n);
                    for (e in r)
                        void 0 === (n = r[e]) ? delete this._props[e] : this._props[e] = n,
                        this.trigger("change:" + e, n),
                        this.trigger("change", e, n);
                    this.trigger("batchChange", r)
                }
            }
            ,
            t.prototype.watch = function(n, t, r, e) {
                var i = this;
                this.unwatch(n),
                this._watchers[n] = this._watchDeps(t, function(t) {
                    var e = r.call(i, t);
                    e && e.then ? (i.unset(n),
                    e.then(function(t) {
                        i.set(n, t)
                    })) : i.set(n, e)
                }, function(t) {
                    i.unset(n),
                    e && e.call(i, t)
                })
            }
            ,
            t.prototype.unwatch = function(t) {
                var e = this._watchers[t];
                e && (delete this._watchers[t],
                e.teardown())
            }
            ,
            t.prototype._watchDeps = function(t, s, e) {
                var n = this
                  , a = 0
                  , l = t.length
                  , u = 0
                  , d = {}
                  , r = []
                  , c = !1
                  , p = function(t, e) {
                    n.on(t, e),
                    r.push([t, e])
                };
                return t.forEach(function(i) {
                    var o = !1;
                    "?" === i.charAt(0) && (i = i.substring(1),
                    o = !0),
                    p("before:change:" + i, function(t) {
                        1 == ++a && u === l && (c = !0,
                        e(d),
                        c = !1)
                    }),
                    p("change:" + i, function(t) {
                        var e, n, r;
                        e = i,
                        r = o,
                        void 0 === (n = t) ? (r || void 0 === d[e] || u--,
                        delete d[e]) : (r || void 0 !== d[e] || u++,
                        d[e] = n),
                        --a || u === l && (c || s(d))
                    })
                }),
                t.forEach(function(t) {
                    var e = !1;
                    "?" === t.charAt(0) && (t = t.substring(1),
                    e = !0),
                    n.has(t) ? (d[t] = n.get(t),
                    u++) : e && u++
                }),
                u === l && s(d),
                {
                    teardown: function() {
                        for (var t = 0; t < r.length; t++)
                            n.off(r[t][0], r[t][1]);
                        r = null,
                        u === l && e()
                    },
                    flash: function() {
                        u === l && (e(),
                        s(d))
                    }
                }
            }
            ,
            t.prototype.flash = function(t) {
                var e = this._watchers[t];
                e && e.flash()
            }
            ,
            t
        }(i.default);
        (e.default = a).prototype._globalWatchArgs = {},
        o.default.mixInto(a),
        s.default.mixInto(a)
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(0)
          , i = n(4)
          , o = n(13)
          , s = n(210);
        e.default = {
            parse: function(t, e) {
                return i.isTimeString(t.start) || r.isDuration(t.start) || i.isTimeString(t.end) || r.isDuration(t.end) ? s.default.parse(t, e) : o.default.parse(t, e)
            }
        }
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var c = n(4)
          , o = n(17)
          , r = function() {
            function d() {
                this.clearEnd = !1,
                this.forceTimed = !1,
                this.forceAllDay = !1
            }
            return d.createFromDiff = function(t, n, r) {
                var e, i, o, s = t.end && !n.end, a = t.isAllDay() && !n.isAllDay(), l = !t.isAllDay() && n.isAllDay();
                function u(t, e) {
                    return r ? c.diffByUnit(t, e, r) : n.isAllDay() ? c.diffDay(t, e) : c.diffDayTime(t, e)
                }
                return e = u(n.start, t.start),
                n.end && (i = u(n.unzonedRange.getEnd(), t.unzonedRange.getEnd()).subtract(e)),
                (o = new d).clearEnd = s,
                o.forceTimed = a,
                o.forceAllDay = l,
                o.setDateDelta(e),
                o.setEndDelta(i),
                o
            }
            ,
            d.prototype.buildNewDateProfile = function(t, e) {
                var n = t.start.clone()
                  , r = null
                  , i = !1;
                return t.end && !this.clearEnd ? r = t.end.clone() : this.endDelta && !r && (r = e.getDefaultEventEnd(t.isAllDay(), n)),
                this.forceTimed ? (i = !0,
                n.hasTime() || n.time(0),
                r && !r.hasTime() && r.time(0)) : this.forceAllDay && (n.hasTime() && n.stripTime(),
                r && r.hasTime() && r.stripTime()),
                this.dateDelta && (i = !0,
                n.add(this.dateDelta),
                r && r.add(this.dateDelta)),
                this.endDelta && (i = !0,
                r.add(this.endDelta)),
                this.startDelta && (i = !0,
                n.add(this.startDelta)),
                i && (n = e.applyTimezone(n),
                r && (r = e.applyTimezone(r))),
                !r && e.opt("forceEventDuration") && (r = e.getDefaultEventEnd(t.isAllDay(), n)),
                new o.default(n,r,e)
            }
            ,
            d.prototype.setDateDelta = function(t) {
                t && t.valueOf() ? this.dateDelta = t : this.dateDelta = null
            }
            ,
            d.prototype.setStartDelta = function(t) {
                t && t.valueOf() ? this.startDelta = t : this.startDelta = null
            }
            ,
            d.prototype.setEndDelta = function(t) {
                t && t.valueOf() ? this.endDelta = t : this.endDelta = null
            }
            ,
            d.prototype.isEmpty = function() {
                return !(this.clearEnd || this.forceTimed || this.forceAllDay || this.dateDelta || this.startDelta || this.endDelta)
            }
            ,
            d
        }();
        e.default = r
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(213)
          , i = n(214)
          , o = {};
        e.defineThemeSystem = function(t, e) {
            o[t] = e
        }
        ,
        e.getThemeSystemClass = function(t) {
            return t ? !0 === t ? i.default : o[t] : r.default
        }
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , i = n(3)
          , o = n(4)
          , s = n(20)
          , a = n(6)
          , l = n(13)
          , u = function(n) {
            function t(t) {
                var e = n.call(this, t) || this;
                return e.eventDefs = [],
                e
            }
            return r.__extends(t, n),
            t.parse = function(t, e) {
                var n;
                return i.isArray(t.events) ? n = t : i.isArray(t) && (n = {
                    events: t
                }),
                !!n && a.default.parse.call(this, n, e)
            }
            ,
            t.prototype.setRawEventDefs = function(t) {
                this.rawEventDefs = t,
                this.eventDefs = this.parseEventDefs(t)
            }
            ,
            t.prototype.fetch = function(t, e, n) {
                var r, i = this.eventDefs;
                if (null != this.currentTimezone && this.currentTimezone !== n)
                    for (r = 0; r < i.length; r++)
                        i[r]instanceof l.default && i[r].rezone();
                return this.currentTimezone = n,
                s.default.resolve(i)
            }
            ,
            t.prototype.addEventDef = function(t) {
                this.eventDefs.push(t)
            }
            ,
            t.prototype.removeEventDefsById = function(e) {
                return o.removeMatching(this.eventDefs, function(t) {
                    return t.id === e
                })
            }
            ,
            t.prototype.removeAllEventDefs = function() {
                this.eventDefs = []
            }
            ,
            t.prototype.getPrimitive = function() {
                return this.rawEventDefs
            }
            ,
            t.prototype.applyManualStandardProps = function(t) {
                var e = n.prototype.applyManualStandardProps.call(this, t);
                return this.setRawEventDefs(t.events),
                e
            }
            ,
            t
        }(a.default);
        (e.default = u).defineStandardProps({
            events: !1
        })
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var a = n(3)
          , r = n(4)
          , i = function() {
            function t(t) {
                this.isHorizontal = !1,
                this.isVertical = !1,
                this.els = a(t.els),
                this.isHorizontal = t.isHorizontal,
                this.isVertical = t.isVertical,
                this.forcedOffsetParentEl = t.offsetParent ? a(t.offsetParent) : null
            }
            return t.prototype.build = function() {
                var t = this.forcedOffsetParentEl;
                !t && 0 < this.els.length && (t = this.els.eq(0).offsetParent()),
                this.origin = t ? t.offset() : null,
                this.boundingRect = this.queryBoundingRect(),
                this.isHorizontal && this.buildElHorizontals(),
                this.isVertical && this.buildElVerticals()
            }
            ,
            t.prototype.clear = function() {
                this.origin = null,
                this.boundingRect = null,
                this.lefts = null,
                this.rights = null,
                this.tops = null,
                this.bottoms = null
            }
            ,
            t.prototype.ensureBuilt = function() {
                this.origin || this.build()
            }
            ,
            t.prototype.buildElHorizontals = function() {
                var o = []
                  , s = [];
                this.els.each(function(t, e) {
                    var n = a(e)
                      , r = n.offset().left
                      , i = n.outerWidth();
                    o.push(r),
                    s.push(r + i)
                }),
                this.lefts = o,
                this.rights = s
            }
            ,
            t.prototype.buildElVerticals = function() {
                var o = []
                  , s = [];
                this.els.each(function(t, e) {
                    var n = a(e)
                      , r = n.offset().top
                      , i = n.outerHeight();
                    o.push(r),
                    s.push(r + i)
                }),
                this.tops = o,
                this.bottoms = s
            }
            ,
            t.prototype.getHorizontalIndex = function(t) {
                this.ensureBuilt();
                var e, n = this.lefts, r = this.rights, i = n.length;
                for (e = 0; e < i; e++)
                    if (t >= n[e] && t < r[e])
                        return e
            }
            ,
            t.prototype.getVerticalIndex = function(t) {
                this.ensureBuilt();
                var e, n = this.tops, r = this.bottoms, i = n.length;
                for (e = 0; e < i; e++)
                    if (t >= n[e] && t < r[e])
                        return e
            }
            ,
            t.prototype.getLeftOffset = function(t) {
                return this.ensureBuilt(),
                this.lefts[t]
            }
            ,
            t.prototype.getLeftPosition = function(t) {
                return this.ensureBuilt(),
                this.lefts[t] - this.origin.left
            }
            ,
            t.prototype.getRightOffset = function(t) {
                return this.ensureBuilt(),
                this.rights[t]
            }
            ,
            t.prototype.getRightPosition = function(t) {
                return this.ensureBuilt(),
                this.rights[t] - this.origin.left
            }
            ,
            t.prototype.getWidth = function(t) {
                return this.ensureBuilt(),
                this.rights[t] - this.lefts[t]
            }
            ,
            t.prototype.getTopOffset = function(t) {
                return this.ensureBuilt(),
                this.tops[t]
            }
            ,
            t.prototype.getTopPosition = function(t) {
                return this.ensureBuilt(),
                this.tops[t] - this.origin.top
            }
            ,
            t.prototype.getBottomOffset = function(t) {
                return this.ensureBuilt(),
                this.bottoms[t]
            }
            ,
            t.prototype.getBottomPosition = function(t) {
                return this.ensureBuilt(),
                this.bottoms[t] - this.origin.top
            }
            ,
            t.prototype.getHeight = function(t) {
                return this.ensureBuilt(),
                this.bottoms[t] - this.tops[t]
            }
            ,
            t.prototype.queryBoundingRect = function() {
                var t;
                return 0 < this.els.length && !(t = r.getScrollParent(this.els.eq(0))).is(document) ? r.getClientRect(t) : null
            }
            ,
            t.prototype.isPointInBounds = function(t, e) {
                return this.isLeftInBounds(t) && this.isTopInBounds(e)
            }
            ,
            t.prototype.isLeftInBounds = function(t) {
                return !this.boundingRect || t >= this.boundingRect.left && t < this.boundingRect.right
            }
            ,
            t.prototype.isTopInBounds = function(t) {
                return !this.boundingRect || t >= this.boundingRect.top && t < this.boundingRect.bottom
            }
            ,
            t
        }();
        e.default = i
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(3)
          , u = n(4)
          , i = n(7)
          , o = n(21)
          , s = function() {
            function t(t) {
                this.isInteracting = !1,
                this.isDistanceSurpassed = !1,
                this.isDelayEnded = !1,
                this.isDragging = !1,
                this.isTouch = !1,
                this.isGeneric = !1,
                this.shouldCancelTouchScroll = !0,
                this.scrollAlwaysKills = !1,
                this.isAutoScroll = !1,
                this.scrollSensitivity = 30,
                this.scrollSpeed = 200,
                this.scrollIntervalMs = 50,
                this.options = t || {}
            }
            return t.prototype.startInteraction = function(t, e) {
                if (void 0 === e && (e = {}),
                "mousedown" === t.type) {
                    if (o.default.get().shouldIgnoreMouse())
                        return;
                    if (!u.isPrimaryMouseButton(t))
                        return;
                    t.preventDefault()
                }
                this.isInteracting || (this.delay = u.firstDefined(e.delay, this.options.delay, 0),
                this.minDistance = u.firstDefined(e.distance, this.options.distance, 0),
                this.subjectEl = this.options.subjectEl,
                u.preventSelection(r("body")),
                this.isInteracting = !0,
                this.isTouch = u.getEvIsTouch(t),
                this.isGeneric = "dragstart" === t.type,
                this.isDelayEnded = !1,
                this.isDistanceSurpassed = !1,
                this.originX = u.getEvX(t),
                this.originY = u.getEvY(t),
                this.scrollEl = u.getScrollParent(r(t.target)),
                this.bindHandlers(),
                this.initAutoScroll(),
                this.handleInteractionStart(t),
                this.startDelay(t),
                this.minDistance || this.handleDistanceSurpassed(t))
            }
            ,
            t.prototype.handleInteractionStart = function(t) {
                this.trigger("interactionStart", t)
            }
            ,
            t.prototype.endInteraction = function(t, e) {
                this.isInteracting && (this.endDrag(t),
                this.delayTimeoutId && (clearTimeout(this.delayTimeoutId),
                this.delayTimeoutId = null),
                this.destroyAutoScroll(),
                this.unbindHandlers(),
                this.isInteracting = !1,
                this.handleInteractionEnd(t, e),
                u.allowSelection(r("body")))
            }
            ,
            t.prototype.handleInteractionEnd = function(t, e) {
                this.trigger("interactionEnd", t, e || !1)
            }
            ,
            t.prototype.bindHandlers = function() {
                var t = o.default.get();
                this.isGeneric ? this.listenTo(r(document), {
                    drag: this.handleMove,
                    dragstop: this.endInteraction
                }) : this.isTouch ? this.listenTo(t, {
                    touchmove: this.handleTouchMove,
                    touchend: this.endInteraction,
                    scroll: this.handleTouchScroll
                }) : this.listenTo(t, {
                    mousemove: this.handleMouseMove,
                    mouseup: this.endInteraction
                }),
                this.listenTo(t, {
                    selectstart: u.preventDefault,
                    contextmenu: u.preventDefault
                })
            }
            ,
            t.prototype.unbindHandlers = function() {
                this.stopListeningTo(o.default.get()),
                this.stopListeningTo(r(document))
            }
            ,
            t.prototype.startDrag = function(t, e) {
                this.startInteraction(t, e),
                this.isDragging || (this.isDragging = !0,
                this.handleDragStart(t))
            }
            ,
            t.prototype.handleDragStart = function(t) {
                this.trigger("dragStart", t)
            }
            ,
            t.prototype.handleMove = function(t) {
                var e = u.getEvX(t) - this.originX
                  , n = u.getEvY(t) - this.originY
                  , r = this.minDistance;
                this.isDistanceSurpassed || r * r <= e * e + n * n && this.handleDistanceSurpassed(t),
                this.isDragging && this.handleDrag(e, n, t)
            }
            ,
            t.prototype.handleDrag = function(t, e, n) {
                this.trigger("drag", t, e, n),
                this.updateAutoScroll(n)
            }
            ,
            t.prototype.endDrag = function(t) {
                this.isDragging && (this.isDragging = !1,
                this.handleDragEnd(t))
            }
            ,
            t.prototype.handleDragEnd = function(t) {
                this.trigger("dragEnd", t)
            }
            ,
            t.prototype.startDelay = function(t) {
                var e = this;
                this.delay ? this.delayTimeoutId = setTimeout(function() {
                    e.handleDelayEnd(t)
                }, this.delay) : this.handleDelayEnd(t)
            }
            ,
            t.prototype.handleDelayEnd = function(t) {
                this.isDelayEnded = !0,
                this.isDistanceSurpassed && this.startDrag(t)
            }
            ,
            t.prototype.handleDistanceSurpassed = function(t) {
                this.isDistanceSurpassed = !0,
                this.isDelayEnded && this.startDrag(t)
            }
            ,
            t.prototype.handleTouchMove = function(t) {
                this.isDragging && this.shouldCancelTouchScroll && t.preventDefault(),
                this.handleMove(t)
            }
            ,
            t.prototype.handleMouseMove = function(t) {
                this.handleMove(t)
            }
            ,
            t.prototype.handleTouchScroll = function(t) {
                this.isDragging && !this.scrollAlwaysKills || this.endInteraction(t, !0)
            }
            ,
            t.prototype.trigger = function(t) {
                for (var e = [], n = 1; n < arguments.length; n++)
                    e[n - 1] = arguments[n];
                this.options[t] && this.options[t].apply(this, e),
                this["_" + t] && this["_" + t].apply(this, e)
            }
            ,
            t.prototype.initAutoScroll = function() {
                var t = this.scrollEl;
                this.isAutoScroll = this.options.scroll && t && !t.is(window) && !t.is(document),
                this.isAutoScroll && this.listenTo(t, "scroll", u.debounce(this.handleDebouncedScroll, 100))
            }
            ,
            t.prototype.destroyAutoScroll = function() {
                this.endAutoScroll(),
                this.isAutoScroll && this.stopListeningTo(this.scrollEl, "scroll")
            }
            ,
            t.prototype.computeScrollBounds = function() {
                this.isAutoScroll && (this.scrollBounds = u.getOuterRect(this.scrollEl))
            }
            ,
            t.prototype.updateAutoScroll = function(t) {
                var e, n, r, i, o = this.scrollSensitivity, s = this.scrollBounds, a = 0, l = 0;
                s && (e = (o - (u.getEvY(t) - s.top)) / o,
                n = (o - (s.bottom - u.getEvY(t))) / o,
                r = (o - (u.getEvX(t) - s.left)) / o,
                i = (o - (s.right - u.getEvX(t))) / o,
                0 <= e && e <= 1 ? a = e * this.scrollSpeed * -1 : 0 <= n && n <= 1 && (a = n * this.scrollSpeed),
                0 <= r && r <= 1 ? l = r * this.scrollSpeed * -1 : 0 <= i && i <= 1 && (l = i * this.scrollSpeed)),
                this.setScrollVel(a, l)
            }
            ,
            t.prototype.setScrollVel = function(t, e) {
                this.scrollTopVel = t,
                this.scrollLeftVel = e,
                this.constrainScrollVel(),
                !this.scrollTopVel && !this.scrollLeftVel || this.scrollIntervalId || (this.scrollIntervalId = setInterval(u.proxy(this, "scrollIntervalFunc"), this.scrollIntervalMs))
            }
            ,
            t.prototype.constrainScrollVel = function() {
                var t = this.scrollEl;
                this.scrollTopVel < 0 ? t.scrollTop() <= 0 && (this.scrollTopVel = 0) : 0 < this.scrollTopVel && t.scrollTop() + t[0].clientHeight >= t[0].scrollHeight && (this.scrollTopVel = 0),
                this.scrollLeftVel < 0 ? t.scrollLeft() <= 0 && (this.scrollLeftVel = 0) : 0 < this.scrollLeftVel && t.scrollLeft() + t[0].clientWidth >= t[0].scrollWidth && (this.scrollLeftVel = 0)
            }
            ,
            t.prototype.scrollIntervalFunc = function() {
                var t = this.scrollEl
                  , e = this.scrollIntervalMs / 1e3;
                this.scrollTopVel && t.scrollTop(t.scrollTop() + this.scrollTopVel * e),
                this.scrollLeftVel && t.scrollLeft(t.scrollLeft() + this.scrollLeftVel * e),
                this.constrainScrollVel(),
                this.scrollTopVel || this.scrollLeftVel || this.endAutoScroll()
            }
            ,
            t.prototype.endAutoScroll = function() {
                this.scrollIntervalId && (clearInterval(this.scrollIntervalId),
                this.scrollIntervalId = null,
                this.handleScrollEnd())
            }
            ,
            t.prototype.handleDebouncedScroll = function() {
                this.scrollIntervalId || this.handleScrollEnd()
            }
            ,
            t.prototype.handleScrollEnd = function() {}
            ,
            t
        }();
        e.default = s,
        i.default.mixInto(s)
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , l = n(4)
          , i = function(t) {
            function e() {
                return null !== t && t.apply(this, arguments) || this
            }
            return r.__extends(e, t),
            e.prototype.updateDayTable = function() {
                for (var t, e, n, r = this.view, i = r.calendar, o = i.msToUtcMoment(this.dateProfile.renderUnzonedRange.startMs, !0), s = i.msToUtcMoment(this.dateProfile.renderUnzonedRange.endMs, !0), a = -1, l = [], u = []; o.isBefore(s); )
                    r.isHiddenDay(o) ? l.push(a + .5) : (a++,
                    l.push(a),
                    u.push(o.clone())),
                    o.add(1, "days");
                if (this.breakOnWeeks) {
                    for (e = u[0].day(),
                    t = 1; t < u.length && u[t].day() !== e; t++)
                        ;
                    n = Math.ceil(u.length / t)
                } else
                    n = 1,
                    t = u.length;
                this.dayDates = u,
                this.dayIndices = l,
                this.daysPerRow = t,
                this.rowCnt = n,
                this.updateDayTableCols()
            }
            ,
            e.prototype.updateDayTableCols = function() {
                this.colCnt = this.computeColCnt(),
                this.colHeadFormat = this.opt("columnHeaderFormat") || this.opt("columnFormat") || this.computeColHeadFormat()
            }
            ,
            e.prototype.computeColCnt = function() {
                return this.daysPerRow
            }
            ,
            e.prototype.getCellDate = function(t, e) {
                return this.dayDates[this.getCellDayIndex(t, e)].clone()
            }
            ,
            e.prototype.getCellRange = function(t, e) {
                var n = this.getCellDate(t, e);
                return {
                    start: n,
                    end: n.clone().add(1, "days")
                }
            }
            ,
            e.prototype.getCellDayIndex = function(t, e) {
                return t * this.daysPerRow + this.getColDayIndex(e)
            }
            ,
            e.prototype.getColDayIndex = function(t) {
                return this.isRTL ? this.colCnt - 1 - t : t
            }
            ,
            e.prototype.getDateDayIndex = function(t) {
                var e = this.dayIndices
                  , n = t.diff(this.dayDates[0], "days");
                return n < 0 ? e[0] - 1 : n >= e.length ? e[e.length - 1] + 1 : e[n]
            }
            ,
            e.prototype.computeColHeadFormat = function() {
                return 1 < this.rowCnt || 10 < this.colCnt ? "ddd" : 1 < this.colCnt ? this.opt("dayOfMonthFormat") : "dddd"
            }
            ,
            e.prototype.sliceRangeByRow = function(t) {
                var e, n, r, i, o, s = this.daysPerRow, a = this.view.computeDayRange(t), l = this.getDateDayIndex(a.start), u = this.getDateDayIndex(a.end.clone().subtract(1, "days")), d = [];
                for (e = 0; e < this.rowCnt; e++)
                    r = (n = e * s) + s - 1,
                    i = Math.max(l, n),
                    o = Math.min(u, r),
                    (i = Math.ceil(i)) <= (o = Math.floor(o)) && d.push({
                        row: e,
                        firstRowDayIndex: i - n,
                        lastRowDayIndex: o - n,
                        isStart: i === l,
                        isEnd: o === u
                    });
                return d
            }
            ,
            e.prototype.sliceRangeByDay = function(t) {
                var e, n, r, i, o, s, a = this.daysPerRow, l = this.view.computeDayRange(t), u = this.getDateDayIndex(l.start), d = this.getDateDayIndex(l.end.clone().subtract(1, "days")), c = [];
                for (e = 0; e < this.rowCnt; e++)
                    for (r = (n = e * a) + a - 1,
                    i = n; i <= r; i++)
                        o = Math.max(u, i),
                        s = Math.min(d, i),
                        (o = Math.ceil(o)) <= (s = Math.floor(s)) && c.push({
                            row: e,
                            firstRowDayIndex: o - n,
                            lastRowDayIndex: s - n,
                            isStart: o === u,
                            isEnd: s === d
                        });
                return c
            }
            ,
            e.prototype.renderHeadHtml = function() {
                var t = this.view.calendar.theme;
                return '<div class="fc-row ' + t.getClass("headerRow") + '"><table class="' + t.getClass("tableGrid") + '"><thead>' + this.renderHeadTrHtml() + "</thead></table></div>"
            }
            ,
            e.prototype.renderHeadIntroHtml = function() {
                return this.renderIntroHtml()
            }
            ,
            e.prototype.renderHeadTrHtml = function() {
                return "<tr>" + (this.isRTL ? "" : this.renderHeadIntroHtml()) + this.renderHeadDateCellsHtml() + (this.isRTL ? this.renderHeadIntroHtml() : "") + "</tr>"
            }
            ,
            e.prototype.renderHeadDateCellsHtml = function() {
                var t, e, n = [];
                for (t = 0; t < this.colCnt; t++)
                    e = this.getCellDate(0, t),
                    n.push(this.renderHeadDateCellHtml(e));
                return n.join("")
            }
            ,
            e.prototype.renderHeadDateCellHtml = function(t, e, n) {
                var r, i = this, o = i.view, s = i.dateProfile.activeUnzonedRange.containsDate(t), a = ["fc-day-header", o.calendar.theme.getClass("widgetHeader")];
                return r = "function" == typeof i.opt("columnHeaderHtml") ? i.opt("columnHeaderHtml")(t) : "function" == typeof i.opt("columnHeaderText") ? l.htmlEscape(i.opt("columnHeaderText")(t)) : l.htmlEscape(t.format(i.colHeadFormat)),
                1 === i.rowCnt ? a = a.concat(i.getDayClasses(t, !0)) : a.push("fc-" + l.dayIDs[t.day()]),
                '<th class="' + a.join(" ") + '"' + (1 === (s && i.rowCnt) ? ' data-date="' + t.format("YYYY-MM-DD") + '"' : "") + (1 < e ? ' colspan="' + e + '"' : "") + (n ? " " + n : "") + ">" + (s ? o.buildGotoAnchorHtml({
                    date: t,
                    forceOff: 1 < i.rowCnt || 1 === i.colCnt
                }, r) : r) + "</th>"
            }
            ,
            e.prototype.renderBgTrHtml = function(t) {
                return "<tr>" + (this.isRTL ? "" : this.renderBgIntroHtml(t)) + this.renderBgCellsHtml(t) + (this.isRTL ? this.renderBgIntroHtml(t) : "") + "</tr>"
            }
            ,
            e.prototype.renderBgIntroHtml = function(t) {
                return this.renderIntroHtml()
            }
            ,
            e.prototype.renderBgCellsHtml = function(t) {
                var e, n, r = [];
                for (e = 0; e < this.colCnt; e++)
                    n = this.getCellDate(t, e),
                    r.push(this.renderBgCellHtml(n));
                return r.join("")
            }
            ,
            e.prototype.renderBgCellHtml = function(t, e) {
                var n = this.view
                  , r = this.dateProfile.activeUnzonedRange.containsDate(t)
                  , i = this.getDayClasses(t);
                return i.unshift("fc-day", n.calendar.theme.getClass("widgetContent")),
                '<td class="' + i.join(" ") + '"' + (r ? ' data-date="' + t.format("YYYY-MM-DD") + '"' : "") + (e ? " " + e : "") + "></td>"
            }
            ,
            e.prototype.renderIntroHtml = function() {}
            ,
            e.prototype.bookendCells = function(t) {
                var e = this.renderIntroHtml();
                e && (this.isRTL ? t.append(e) : t.prepend(e))
            }
            ,
            e
        }(n(14).default);
        e.default = i
    }
    , function(t, e) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var n = function() {
            function t(t, e) {
                this.component = t,
                this.fillRenderer = e
            }
            return t.prototype.render = function(t) {
                var e = this.component
                  , n = e._getDateProfile().activeUnzonedRange
                  , r = t.buildEventInstanceGroup(e.hasAllDayBusinessHours, n)
                  , i = r ? e.eventRangesToEventFootprints(r.sliceRenderRanges(n)) : [];
                this.renderEventFootprints(i)
            }
            ,
            t.prototype.renderEventFootprints = function(t) {
                var e = this.component.eventFootprintsToSegs(t);
                this.renderSegs(e),
                this.segs = e
            }
            ,
            t.prototype.renderSegs = function(t) {
                this.fillRenderer && this.fillRenderer.renderSegs("businessHours", t, {
                    getClasses: function(t) {
                        return ["fc-nonbusiness", "fc-bgevent"]
                    }
                })
            }
            ,
            t.prototype.unrender = function() {
                this.fillRenderer && this.fillRenderer.unrender("businessHours"),
                this.segs = null
            }
            ,
            t.prototype.getSegs = function() {
                return this.segs || []
            }
            ,
            t
        }();
        e.default = n
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var l = n(3)
          , o = n(4)
          , r = function() {
            function t(t) {
                this.fillSegTag = "div",
                this.component = t,
                this.elsByFill = {}
            }
            return t.prototype.renderFootprint = function(t, e, n) {
                this.renderSegs(t, this.component.componentFootprintToSegs(e), n)
            }
            ,
            t.prototype.renderSegs = function(t, e, n) {
                var r;
                return e = this.buildSegEls(t, e, n),
                (r = this.attachSegEls(t, e)) && this.reportEls(t, r),
                e
            }
            ,
            t.prototype.unrender = function(t) {
                var e = this.elsByFill[t];
                e && (e.remove(),
                delete this.elsByFill[t])
            }
            ,
            t.prototype.buildSegEls = function(t, i, o) {
                var e, s = this, n = "", a = [];
                if (i.length) {
                    for (e = 0; e < i.length; e++)
                        n += this.buildSegHtml(t, i[e], o);
                    l(n).each(function(t, e) {
                        var n = i[t]
                          , r = l(e);
                        o.filterEl && (r = o.filterEl(n, r)),
                        r && (r = l(r)).is(s.fillSegTag) && (n.el = r,
                        a.push(n))
                    })
                }
                return a
            }
            ,
            t.prototype.buildSegHtml = function(t, e, n) {
                var r = n.getClasses ? n.getClasses(e) : []
                  , i = o.cssToStr(n.getCss ? n.getCss(e) : {});
                return "<" + this.fillSegTag + (r.length ? ' class="' + r.join(" ") + '"' : "") + (i ? ' style="' + i + '"' : "") + " />"
            }
            ,
            t.prototype.attachSegEls = function(t, e) {}
            ,
            t.prototype.reportEls = function(t, e) {
                this.elsByFill[t] ? this.elsByFill[t] = this.elsByFill[t].add(e) : this.elsByFill[t] = l(e)
            }
            ,
            t
        }();
        e.default = r
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var o = n(13)
          , s = n(36)
          , a = n(6)
          , r = function() {
            function t(t, e) {
                this.view = t._getView(),
                this.component = t,
                this.eventRenderer = e
            }
            return t.prototype.renderComponentFootprint = function(t) {
                this.renderEventFootprints([this.fabricateEventFootprint(t)])
            }
            ,
            t.prototype.renderEventDraggingFootprints = function(t, e, n) {
                this.renderEventFootprints(t, e, "fc-dragging", n ? null : this.view.opt("dragOpacity"))
            }
            ,
            t.prototype.renderEventResizingFootprints = function(t, e, n) {
                this.renderEventFootprints(t, e, "fc-resizing")
            }
            ,
            t.prototype.renderEventFootprints = function(t, e, n, r) {
                var i, o = this.component.eventFootprintsToSegs(t), s = "fc-helper " + (n || "");
                for (o = this.eventRenderer.renderFgSegEls(o),
                i = 0; i < o.length; i++)
                    o[i].el.addClass(s);
                if (null != r)
                    for (i = 0; i < o.length; i++)
                        o[i].el.css("opacity", r);
                this.helperEls = this.renderSegs(o, e)
            }
            ,
            t.prototype.renderSegs = function(t, e) {}
            ,
            t.prototype.unrender = function() {
                this.helperEls && (this.helperEls.remove(),
                this.helperEls = null)
            }
            ,
            t.prototype.fabricateEventFootprint = function(t) {
                var e, n = this.view.calendar, r = n.footprintToDateProfile(t), i = new o.default(new a.default(n));
                return i.dateProfile = r,
                e = i.buildInstance(),
                new s.default(t,i,e)
            }
            ,
            t
        }();
        e.default = r
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , i = n(21)
          , o = function(t) {
            function e() {
                return null !== t && t.apply(this, arguments) || this
            }
            return r.__extends(e, t),
            e.prototype.bindToEl = function(t) {
                var e = this.component;
                e.bindSegHandlerToEl(t, "click", this.handleClick.bind(this)),
                e.bindSegHandlerToEl(t, "mouseenter", this.handleMouseover.bind(this)),
                e.bindSegHandlerToEl(t, "mouseleave", this.handleMouseout.bind(this))
            }
            ,
            e.prototype.handleClick = function(t, e) {
                !1 === this.component.publiclyTrigger("eventClick", {
                    context: t.el[0],
                    args: [t.footprint.getEventLegacy(), e, this.view]
                }) && e.preventDefault()
            }
            ,
            e.prototype.handleMouseover = function(t, e) {
                i.default.get().shouldIgnoreMouse() || this.mousedOverSeg || (this.mousedOverSeg = t,
                this.view.isEventDefResizable(t.footprint.eventDef) && t.el.addClass("fc-allow-mouse-resize"),
                this.component.publiclyTrigger("eventMouseover", {
                    context: t.el[0],
                    args: [t.footprint.getEventLegacy(), e, this.view]
                }))
            }
            ,
            e.prototype.handleMouseout = function(t, e) {
                this.mousedOverSeg && (this.mousedOverSeg = null,
                this.view.isEventDefResizable(t.footprint.eventDef) && t.el.removeClass("fc-allow-mouse-resize"),
                this.component.publiclyTrigger("eventMouseout", {
                    context: t.el[0],
                    args: [t.footprint.getEventLegacy(), e || {}, this.view]
                }))
            }
            ,
            e.prototype.end = function() {
                this.mousedOverSeg && this.handleMouseout(this.mousedOverSeg)
            }
            ,
            e
        }(n(15).default);
        e.default = o
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , i = n(14)
          , o = n(245)
          , s = n(225)
          , a = n(59)
          , l = n(224)
          , u = n(223)
          , d = n(222)
          , c = function(t) {
            function e() {
                return null !== t && t.apply(this, arguments) || this
            }
            return r.__extends(e, t),
            e
        }(i.default);
        (e.default = c).prototype.dateClickingClass = o.default,
        c.prototype.dateSelectingClass = s.default,
        c.prototype.eventPointingClass = a.default,
        c.prototype.eventDraggingClass = l.default,
        c.prototype.eventResizingClass = u.default,
        c.prototype.externalDroppingClass = d.default
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , E = n(3)
          , l = n(4)
          , s = n(53)
          , u = n(249)
          , d = n(5)
          , c = n(12)
          , p = n(36)
          , i = n(56)
          , o = n(60)
          , a = n(40)
          , h = n(55)
          , f = n(250)
          , g = n(251)
          , v = n(252)
          , y = function(n) {
            function t(t) {
                var e = n.call(this, t) || this;
                return e.cellWeekNumbersVisible = !1,
                e.bottomCoordPadding = 0,
                e.isRigid = !1,
                e.hasAllDayBusinessHours = !0,
                e
            }
            return r.__extends(t, n),
            t.prototype.componentFootprintToSegs = function(t) {
                var e, n, r = this.sliceRangeByRow(t.unzonedRange);
                for (e = 0; e < r.length; e++)
                    n = r[e],
                    this.isRTL ? (n.leftCol = this.daysPerRow - 1 - n.lastRowDayIndex,
                    n.rightCol = this.daysPerRow - 1 - n.firstRowDayIndex) : (n.leftCol = n.firstRowDayIndex,
                    n.rightCol = n.lastRowDayIndex);
                return r
            }
            ,
            t.prototype.renderDates = function(t) {
                this.dateProfile = t,
                this.updateDayTable(),
                this.renderGrid()
            }
            ,
            t.prototype.unrenderDates = function() {
                this.removeSegPopover()
            }
            ,
            t.prototype.renderGrid = function() {
                var t, e, n = this.view, r = this.rowCnt, i = this.colCnt, o = "";
                for (this.headContainerEl && this.headContainerEl.html(this.renderHeadHtml()),
                t = 0; t < r; t++)
                    o += this.renderDayRowHtml(t, this.isRigid);
                for (this.el.html(o),
                this.rowEls = this.el.find(".fc-row"),
                this.cellEls = this.el.find(".fc-day, .fc-disabled-day"),
                this.rowCoordCache = new s.default({
                    els: this.rowEls,
                    isVertical: !0
                }),
                this.colCoordCache = new s.default({
                    els: this.cellEls.slice(0, this.colCnt),
                    isHorizontal: !0
                }),
                t = 0; t < r; t++)
                    for (e = 0; e < i; e++)
                        this.publiclyTrigger("dayRender", {
                            context: n,
                            args: [this.getCellDate(t, e), this.getCellEl(t, e), n]
                        })
            }
            ,
            t.prototype.renderDayRowHtml = function(t, e) {
                var n = this.view.calendar.theme
                  , r = ["fc-row", "fc-week", n.getClass("dayRow")];
                return e && r.push("fc-rigid"),
                '<div class="' + r.join(" ") + '"><div class="fc-bg"><table class="' + n.getClass("tableGrid") + '">' + this.renderBgTrHtml(t) + '</table></div><div class="fc-content-skeleton"><table>' + (this.getIsNumbersVisible() ? "<thead>" + this.renderNumberTrHtml(t) + "</thead>" : "") + "</table></div></div>"
            }
            ,
            t.prototype.getIsNumbersVisible = function() {
                return this.getIsDayNumbersVisible() || this.cellWeekNumbersVisible
            }
            ,
            t.prototype.getIsDayNumbersVisible = function() {
                return 1 < this.rowCnt
            }
            ,
            t.prototype.renderNumberTrHtml = function(t) {
                return "<tr>" + (this.isRTL ? "" : this.renderNumberIntroHtml(t)) + this.renderNumberCellsHtml(t) + (this.isRTL ? this.renderNumberIntroHtml(t) : "") + "</tr>"
            }
            ,
            t.prototype.renderNumberIntroHtml = function(t) {
                return this.renderIntroHtml()
            }
            ,
            t.prototype.renderNumberCellsHtml = function(t) {
                var e, n, r = [];
                for (e = 0; e < this.colCnt; e++)
                    n = this.getCellDate(t, e),
                    r.push(this.renderNumberCellHtml(n));
                return r.join("")
            }
            ,
            t.prototype.renderNumberCellHtml = function(t) {
                var e, n, r = this.view, i = "", o = this.dateProfile.activeUnzonedRange.containsDate(t), s = this.getIsDayNumbersVisible() && o;
                return s || this.cellWeekNumbersVisible ? ((e = this.getDayClasses(t)).unshift("fc-day-top"),
                this.cellWeekNumbersVisible && (n = "ISO" === t._locale._fullCalendar_weekCalc ? 1 : t._locale.firstDayOfWeek()),
                i += '<td class="' + e.join(" ") + '"' + (o ? ' data-date="' + t.format() + '"' : "") + ">",
                this.cellWeekNumbersVisible && t.day() === n && (i += r.buildGotoAnchorHtml({
                    date: t,
                    type: "week"
                }, {
                    class: "fc-week-number"
                }, t.format("w"))),
                s && (i += r.buildGotoAnchorHtml(t, {
                    class: "fc-day-number"
                }, t.format("D"))),
                i += "</td>") : "<td/>"
            }
            ,
            t.prototype.prepareHits = function() {
                this.colCoordCache.build(),
                this.rowCoordCache.build(),
                this.rowCoordCache.bottoms[this.rowCnt - 1] += this.bottomCoordPadding
            }
            ,
            t.prototype.releaseHits = function() {
                this.colCoordCache.clear(),
                this.rowCoordCache.clear()
            }
            ,
            t.prototype.queryHit = function(t, e) {
                if (this.colCoordCache.isLeftInBounds(t) && this.rowCoordCache.isTopInBounds(e)) {
                    var n = this.colCoordCache.getHorizontalIndex(t)
                      , r = this.rowCoordCache.getVerticalIndex(e);
                    if (null != r && null != n)
                        return this.getCellHit(r, n)
                }
            }
            ,
            t.prototype.getHitFootprint = function(t) {
                var e = this.getCellRange(t.row, t.col);
                return new c.default(new d.default(e.start,e.end),!0)
            }
            ,
            t.prototype.getHitEl = function(t) {
                return this.getCellEl(t.row, t.col)
            }
            ,
            t.prototype.getCellHit = function(t, e) {
                return {
                    row: t,
                    col: e,
                    component: this,
                    left: this.colCoordCache.getLeftOffset(e),
                    right: this.colCoordCache.getRightOffset(e),
                    top: this.rowCoordCache.getTopOffset(t),
                    bottom: this.rowCoordCache.getBottomOffset(t)
                }
            }
            ,
            t.prototype.getCellEl = function(t, e) {
                return this.cellEls.eq(t * this.colCnt + e)
            }
            ,
            t.prototype.executeEventUnrender = function() {
                this.removeSegPopover(),
                n.prototype.executeEventUnrender.call(this)
            }
            ,
            t.prototype.getOwnEventSegs = function() {
                return n.prototype.getOwnEventSegs.call(this).concat(this.popoverSegs || [])
            }
            ,
            t.prototype.renderDrag = function(t, e, n) {
                var r;
                for (r = 0; r < t.length; r++)
                    this.renderHighlight(t[r].componentFootprint);
                if (t.length && e && e.component !== this)
                    return this.helperRenderer.renderEventDraggingFootprints(t, e, n),
                    !0
            }
            ,
            t.prototype.unrenderDrag = function() {
                this.unrenderHighlight(),
                this.helperRenderer.unrender()
            }
            ,
            t.prototype.renderEventResize = function(t, e, n) {
                var r;
                for (r = 0; r < t.length; r++)
                    this.renderHighlight(t[r].componentFootprint);
                this.helperRenderer.renderEventResizingFootprints(t, e, n)
            }
            ,
            t.prototype.unrenderEventResize = function() {
                this.unrenderHighlight(),
                this.helperRenderer.unrender()
            }
            ,
            t.prototype.removeSegPopover = function() {
                this.segPopover && this.segPopover.hide()
            }
            ,
            t.prototype.limitRows = function(t) {
                var e, n, r = this.eventRenderer.rowStructs || [];
                for (e = 0; e < r.length; e++)
                    this.unlimitRow(e),
                    !1 !== (n = !!t && ("number" == typeof t ? t : this.computeRowLevelLimit(e))) && this.limitRow(e, n)
            }
            ,
            t.prototype.computeRowLevelLimit = function(t) {
                var e, n, r, i = this.rowEls.eq(t).height(), o = this.eventRenderer.rowStructs[t].tbodyEl.children();
                function s(t, e) {
                    r = Math.max(r, E(e).outerHeight())
                }
                for (e = 0; e < o.length; e++)
                    if (n = o.eq(e).removeClass("fc-limited"),
                    r = 0,
                    n.find("> td > :first-child").each(s),
                    n.position().top + r > i)
                        return e;
                return !1
            }
            ,
            t.prototype.limitRow = function(e, n) {
                var t, r, i, o, s, a, l, u, d, c, p, h, f, g, v, y = this, m = this.eventRenderer.rowStructs[e], b = [], w = 0, D = function(t) {
                    for (; w < t; )
                        (a = y.getCellSegs(e, w, n)).length && (d = r[n - 1][w],
                        v = y.renderMoreLink(e, w, a),
                        g = E("<div/>").append(v),
                        d.append(g),
                        b.push(g[0])),
                        w++
                };
                if (n && n < m.segLevels.length) {
                    for (t = m.segLevels[n - 1],
                    r = m.cellMatrix,
                    i = m.tbodyEl.children().slice(n).addClass("fc-limited").get(),
                    o = 0; o < t.length; o++) {
                        for (D((s = t[o]).leftCol),
                        u = [],
                        l = 0; w <= s.rightCol; )
                            a = this.getCellSegs(e, w, n),
                            u.push(a),
                            l += a.length,
                            w++;
                        if (l) {
                            for (c = (d = r[n - 1][s.leftCol]).attr("rowspan") || 1,
                            p = [],
                            h = 0; h < u.length; h++)
                                f = E('<td class="fc-more-cell"/>').attr("rowspan", c),
                                a = u[h],
                                v = this.renderMoreLink(e, s.leftCol + h, [s].concat(a)),
                                g = E("<div/>").append(v),
                                f.append(g),
                                p.push(f[0]),
                                b.push(f[0]);
                            d.addClass("fc-limited").after(E(p)),
                            i.push(d[0])
                        }
                    }
                    D(this.colCnt),
                    m.moreEls = E(b),
                    m.limitedEls = E(i)
                }
            }
            ,
            t.prototype.unlimitRow = function(t) {
                var e = this.eventRenderer.rowStructs[t];
                e.moreEls && (e.moreEls.remove(),
                e.moreEls = null),
                e.limitedEls && (e.limitedEls.removeClass("fc-limited"),
                e.limitedEls = null)
            }
            ,
            t.prototype.renderMoreLink = function(l, u, d) {
                var c = this
                  , p = this.view;
                return E('<a class="fc-more"/>').text(this.getMoreLinkText(d.length)).on("click", function(t) {
                    var e = c.opt("eventLimitClick")
                      , n = c.getCellDate(l, u)
                      , r = E(t.currentTarget)
                      , i = c.getCellEl(l, u)
                      , o = c.getCellSegs(l, u)
                      , s = c.resliceDaySegs(o, n)
                      , a = c.resliceDaySegs(d, n);
                    "function" == typeof e && (e = c.publiclyTrigger("eventLimitClick", {
                        context: p,
                        args: [{
                            date: n.clone(),
                            dayEl: i,
                            moreEl: r,
                            segs: s,
                            hiddenSegs: a
                        }, t, p]
                    })),
                    "popover" === e ? c.showSegPopover(l, u, r, s) : "string" == typeof e && p.calendar.zoomTo(n, e)
                })
            }
            ,
            t.prototype.showSegPopover = function(t, e, n, r) {
                var i, o, s = this, a = this.view, l = n.parent();
                i = 1 === this.rowCnt ? a.el : this.rowEls.eq(t),
                o = {
                    className: "fc-more-popover " + a.calendar.theme.getClass("popover"),
                    content: this.renderSegPopoverContent(t, e, r),
                    parentEl: a.el,
                    top: i.offset().top,
                    autoHide: !0,
                    viewportConstrain: this.opt("popoverViewportConstrain"),
                    hide: function() {
                        s.popoverSegs && s.triggerBeforeEventSegsDestroyed(s.popoverSegs),
                        s.segPopover.removeElement(),
                        s.segPopover = null,
                        s.popoverSegs = null
                    }
                },
                this.isRTL ? o.right = l.offset().left + l.outerWidth() + 1 : o.left = l.offset().left - 1,
                this.segPopover = new u.default(o),
                this.segPopover.show(),
                this.bindAllSegHandlersToEl(this.segPopover.el),
                this.triggerAfterEventSegsRendered(r)
            }
            ,
            t.prototype.renderSegPopoverContent = function(t, e, n) {
                var r, i = this.view.calendar.theme, o = this.getCellDate(t, e).format(this.opt("dayPopoverFormat")), s = E('<div class="fc-header ' + i.getClass("popoverHeader") + '"><span class="fc-close ' + i.getIconClass("close") + '"></span><span class="fc-title">' + l.htmlEscape(o) + '</span><div class="fc-clear"/></div><div class="fc-body ' + i.getClass("popoverContent") + '"><div class="fc-event-container"></div></div>'), a = s.find(".fc-event-container");
                for (n = this.eventRenderer.renderFgSegEls(n, !0),
                this.popoverSegs = n,
                r = 0; r < n.length; r++)
                    this.hitsNeeded(),
                    n[r].hit = this.getCellHit(t, e),
                    this.hitsNotNeeded(),
                    a.append(n[r].el);
                return s
            }
            ,
            t.prototype.resliceDaySegs = function(t, e) {
                var n, r, i, o = e.clone(), s = o.clone().add(1, "days"), a = new d.default(o,s), l = [];
                for (n = 0; n < t.length; n++)
                    (i = (r = t[n]).footprint.componentFootprint.unzonedRange.intersect(a)) && l.push(E.extend({}, r, {
                        footprint: new p.default(new c.default(i,r.footprint.componentFootprint.isAllDay),r.footprint.eventDef,r.footprint.eventInstance),
                        isStart: r.isStart && i.isStart,
                        isEnd: r.isEnd && i.isEnd
                    }));
                return this.eventRenderer.sortEventSegs(l),
                l
            }
            ,
            t.prototype.getMoreLinkText = function(t) {
                var e = this.opt("eventLimitText");
                return "function" == typeof e ? e(t) : "+" + t + " " + e
            }
            ,
            t.prototype.getCellSegs = function(t, e, n) {
                for (var r, i = this.eventRenderer.rowStructs[t].segMatrix, o = n || 0, s = []; o < i.length; )
                    (r = i[o][e]) && s.push(r),
                    o++;
                return s
            }
            ,
            t
        }(a.default);
        (e.default = y).prototype.eventRendererClass = f.default,
        y.prototype.businessHourRendererClass = i.default,
        y.prototype.helperRendererClass = g.default,
        y.prototype.fillRendererClass = v.default,
        o.default.mixInto(y),
        h.default.mixInto(y)
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , i = n(3)
          , l = n(4)
          , o = n(39)
          , s = n(41)
          , a = n(228)
          , u = n(61)
          , d = function(a) {
            function t(t, e) {
                var n = a.call(this, t, e) || this;
                return n.dayGrid = n.instantiateDayGrid(),
                n.dayGrid.isRigid = n.hasRigidRows(),
                n.opt("weekNumbers") && (n.opt("weekNumbersWithinDays") ? (n.dayGrid.cellWeekNumbersVisible = !0,
                n.dayGrid.colWeekNumbersVisible = !1) : (n.dayGrid.cellWeekNumbersVisible = !1,
                n.dayGrid.colWeekNumbersVisible = !0)),
                n.addChild(n.dayGrid),
                n.scroller = new o.default({
                    overflowX: "hidden",
                    overflowY: "auto"
                }),
                n
            }
            return r.__extends(t, a),
            t.prototype.instantiateDayGrid = function() {
                return new (function(e) {
                    function t() {
                        var t = null !== e && e.apply(this, arguments) || this;
                        return t.colWeekNumbersVisible = !1,
                        t
                    }
                    return r.__extends(t, e),
                    t.prototype.renderHeadIntroHtml = function() {
                        var t = this.view;
                        return this.colWeekNumbersVisible ? '<th class="fc-week-number ' + t.calendar.theme.getClass("widgetHeader") + '" ' + t.weekNumberStyleAttr() + "><span>" + l.htmlEscape(this.opt("weekNumberTitle")) + "</span></th>" : ""
                    }
                    ,
                    t.prototype.renderNumberIntroHtml = function(t) {
                        var e = this.view
                          , n = this.getCellDate(t, 0);
                        return this.colWeekNumbersVisible ? '<td class="fc-week-number" ' + e.weekNumberStyleAttr() + ">" + e.buildGotoAnchorHtml({
                            date: n,
                            type: "week",
                            forceOff: 1 === this.colCnt
                        }, n.format("w")) + "</td>" : ""
                    }
                    ,
                    t.prototype.renderBgIntroHtml = function() {
                        var t = this.view;
                        return this.colWeekNumbersVisible ? '<td class="fc-week-number ' + t.calendar.theme.getClass("widgetContent") + '" ' + t.weekNumberStyleAttr() + "></td>" : ""
                    }
                    ,
                    t.prototype.renderIntroHtml = function() {
                        var t = this.view;
                        return this.colWeekNumbersVisible ? '<td class="fc-week-number" ' + t.weekNumberStyleAttr() + "></td>" : ""
                    }
                    ,
                    t.prototype.getIsNumbersVisible = function() {
                        return u.default.prototype.getIsNumbersVisible.apply(this, arguments) || this.colWeekNumbersVisible
                    }
                    ,
                    t
                }(this.dayGridClass))(this)
            }
            ,
            t.prototype.executeDateRender = function(t) {
                this.dayGrid.breakOnWeeks = /year|month|week/.test(t.currentRangeUnit),
                a.prototype.executeDateRender.call(this, t)
            }
            ,
            t.prototype.renderSkeleton = function() {
                var t, e;
                this.el.addClass("fc-basic-view").html(this.renderSkeletonHtml()),
                this.scroller.render(),
                t = this.scroller.el.addClass("fc-day-grid-container"),
                e = i('<div class="fc-day-grid" />').appendTo(t),
                this.el.find(".fc-body > tr > td").append(t),
                this.dayGrid.headContainerEl = this.el.find(".fc-head-container"),
                this.dayGrid.setElement(e)
            }
            ,
            t.prototype.unrenderSkeleton = function() {
                this.dayGrid.removeElement(),
                this.scroller.destroy()
            }
            ,
            t.prototype.renderSkeletonHtml = function() {
                var t = this.calendar.theme;
                return '<table class="' + t.getClass("tableGrid") + '">' + (this.opt("columnHeader") ? '<thead class="fc-head"><tr><td class="fc-head-container ' + t.getClass("widgetHeader") + '">&nbsp;</td></tr></thead>' : "") + '<tbody class="fc-body"><tr><td class="' + t.getClass("widgetContent") + '"></td></tr></tbody></table>'
            }
            ,
            t.prototype.weekNumberStyleAttr = function() {
                return null != this.weekNumberWidth ? 'style="width:' + this.weekNumberWidth + 'px"' : ""
            }
            ,
            t.prototype.hasRigidRows = function() {
                var t = this.opt("eventLimit");
                return t && "number" != typeof t
            }
            ,
            t.prototype.updateSize = function(t, e, n) {
                var r, i, o = this.opt("eventLimit"), s = this.dayGrid.headContainerEl.find(".fc-row");
                this.dayGrid.rowEls ? (a.prototype.updateSize.call(this, t, e, n),
                this.dayGrid.colWeekNumbersVisible && (this.weekNumberWidth = l.matchCellWidths(this.el.find(".fc-week-number"))),
                this.scroller.clear(),
                l.uncompensateScroll(s),
                this.dayGrid.removeSegPopover(),
                o && "number" == typeof o && this.dayGrid.limitRows(o),
                r = this.computeScrollerHeight(t),
                this.setGridHeight(r, e),
                o && "number" != typeof o && this.dayGrid.limitRows(o),
                e || (this.scroller.setHeight(r),
                ((i = this.scroller.getScrollbarWidths()).left || i.right) && (l.compensateScroll(s, i),
                r = this.computeScrollerHeight(t),
                this.scroller.setHeight(r)),
                this.scroller.lockOverflow(i))) : e || (r = this.computeScrollerHeight(t),
                this.scroller.setHeight(r))
            }
            ,
            t.prototype.computeScrollerHeight = function(t) {
                return t - l.subtractInnerElHeight(this.el, this.scroller.el)
            }
            ,
            t.prototype.setGridHeight = function(t, e) {
                e ? l.undistributeHeight(this.dayGrid.rowEls) : l.distributeHeight(this.dayGrid.rowEls, t, !0)
            }
            ,
            t.prototype.computeInitialDateScroll = function() {
                return {
                    top: 0
                }
            }
            ,
            t.prototype.queryDateScroll = function() {
                return {
                    top: this.scroller.getScrollTop()
                }
            }
            ,
            t.prototype.applyDateScroll = function(t) {
                void 0 !== t.top && this.scroller.setScrollTop(t.top)
            }
            ,
            t
        }(s.default);
        (e.default = d).prototype.dateProfileGeneratorClass = a.default,
        d.prototype.dayGridClass = u.default
    }
    , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(5)
          , i = n(12)
          , o = n(49)
          , s = n(6)
          , u = n(35)
          , a = function() {
            function t(t, e) {
                this.eventManager = t,
                this._calendar = e
            }
            return t.prototype.opt = function(t) {
                return this._calendar.opt(t)
            }
            ,
            t.prototype.isEventInstanceGroupAllowed = function(t) {
                var e, n = t.getEventDef(), r = this.eventRangesToEventFootprints(t.getAllEventRanges()), i = this.getPeerEventInstances(n).map(u.eventInstanceToEventRange), o = this.eventRangesToEventFootprints(i), s = n.getConstraint(), a = n.getOverlap(), l = this.opt("eventAllow");
                for (e = 0; e < r.length; e++)
                    if (!this.isFootprintAllowed(r[e].componentFootprint, o, s, a, r[e].eventInstance))
                        return !1;
                if (l)
                    for (e = 0; e < r.length; e++)
                        if (!1 === l(r[e].componentFootprint.toLegacy(this._calendar), r[e].getEventLegacy()))
                            return !1;
                return !0
            }
            ,
            t.prototype.getPeerEventInstances = function(t) {
                return this.eventManager.getEventInstancesWithoutId(t.id)
            }
            ,
            t.prototype.isSelectionFootprintAllowed = function(t) {
                var e, n = this.eventManager.getEventInstances().map(u.eventInstanceToEventRange), r = this.eventRangesToEventFootprints(n);
                return !!this.isFootprintAllowed(t, r, this.opt("selectConstraint"), this.opt("selectOverlap")) && (!(e = this.opt("selectAllow")) || !1 !== e(t.toLegacy(this._calendar)))
            }
            ,
            t.prototype.isFootprintAllowed = function(t, e, n, r, i) {
                var o, s;
                if (null != n && (o = this.constraintValToFootprints(n, t.isAllDay),
                !this.isFootprintWithinConstraints(t, o)))
                    return !1;
                if (s = this.collectOverlapEventFootprints(e, t),
                !1 === r) {
                    if (s.length)
                        return !1
                } else if ("function" == typeof r && !function(t, e, n) {
                    var r;
                    for (r = 0; r < t.length; r++)
                        if (!e(t[r].eventInstance.toLegacy(), n ? n.toLegacy() : null))
                            return !1;
                    return !0
                }(s, r, i))
                    return !1;
                return !(i && !function(t, e) {
                    var n, r, i, o, s = e.toLegacy();
                    for (n = 0; n < t.length; n++) {
                        if (r = t[n].eventInstance,
                        i = r.def,
                        !1 === (o = i.getOverlap()))
                            return !1;
                        if ("function" == typeof o && !o(r.toLegacy(), s))
                            return !1
                    }
                    return !0
                }(s, i))
            }
            ,
            t.prototype.isFootprintWithinConstraints = function(t, e) {
                var n;
                for (n = 0; n < e.length; n++)
                    if (this.footprintContainsFootprint(e[n], t))
                        return !0;
                return !1
            }
            ,
            t.prototype.constraintValToFootprints = function(t, e) {
                var n;
                return "businessHours" === t ? this.buildCurrentBusinessFootprints(e) : "object" == typeof t ? (n = this.parseEventDefToInstances(t)) ? this.eventInstancesToFootprints(n) : this.parseFootprints(t) : null != t ? (n = this.eventManager.getEventInstancesWithId(t),
                this.eventInstancesToFootprints(n)) : void 0
            }
            ,
            t.prototype.buildCurrentBusinessFootprints = function(t) {
                var e = this._calendar.view
                  , n = e.get("businessHourGenerator")
                  , r = e.dateProfile.activeUnzonedRange
                  , i = n.buildEventInstanceGroup(t, r);
                return i ? this.eventInstancesToFootprints(i.eventInstances) : []
            }
            ,
            t.prototype.eventInstancesToFootprints = function(t) {
                var e = t.map(u.eventInstanceToEventRange);
                return this.eventRangesToEventFootprints(e).map(u.eventFootprintToComponentFootprint)
            }
            ,
            t.prototype.collectOverlapEventFootprints = function(t, e) {
                var n, r = [];
                for (n = 0; n < t.length; n++)
                    this.footprintsIntersect(e, t[n].componentFootprint) && r.push(t[n]);
                return r
            }
            ,
            t.prototype.parseEventDefToInstances = function(t) {
                var e = this.eventManager
                  , n = o.default.parse(t, new s.default(this._calendar));
                return !!n && n.buildInstances(e.currentPeriod.unzonedRange)
            }
            ,
            t.prototype.eventRangesToEventFootprints = function(t) {
                var e, n = [];
                for (e = 0; e < t.length; e++)
                    n.push.apply(n, this.eventRangeToEventFootprints(t[e]));
                return n
            }
            ,
            t.prototype.eventRangeToEventFootprints = function(t) {
                return [u.eventRangeToEventFootprint(t)]
            }
            ,
            t.prototype.parseFootprints = function(t) {
                var e, n;
                return t.start && ((e = this._calendar.moment(t.start)).isValid() || (e = null)),
                t.end && ((n = this._calendar.moment(t.end)).isValid() || (n = null)),
                [new i.default(new r.default(e,n),e && !e.hasTime() || n && !n.hasTime())]
            }
            ,
            t.prototype.footprintContainsFootprint = function(t, e) {
                return t.unzonedRange.containsRange(e.unzonedRange)
            }
            ,
            t.prototype.footprintsIntersect = function(t, e) {
                return t.unzonedRange.intersectsWith(e.unzonedRange)
            }
            ,
            t
        }();
        e.default = a
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , i = n(4)
          , o = function(t) {
            function e() {
                return null !== t && t.apply(this, arguments) || this
            }
            return r.__extends(e, t),
            e.defineStandardProps = function(t) {
                var e = this.prototype;
                e.hasOwnProperty("standardPropMap") || (e.standardPropMap = Object.create(e.standardPropMap)),
                i.copyOwnProps(t, e.standardPropMap)
            }
            ,
            e.copyVerbatimStandardProps = function(t, e) {
                var n, r = this.prototype.standardPropMap;
                for (n in r)
                    null != t[n] && !0 === r[n] && (e[n] = t[n])
            }
            ,
            e.prototype.applyProps = function(t) {
                var e, n = this.standardPropMap, r = {}, i = {};
                for (e in t)
                    !0 === n[e] ? this[e] = t[e] : !1 === n[e] ? r[e] = t[e] : i[e] = t[e];
                return this.applyMiscProps(i),
                this.applyManualStandardProps(r)
            }
            ,
            e.prototype.applyManualStandardProps = function(t) {
                return !0
            }
            ,
            e.prototype.applyMiscProps = function(t) {}
            ,
            e.prototype.isStandardProp = function(t) {
                return t in this.standardPropMap
            }
            ,
            e
        }(n(14).default);
        (e.default = o).prototype.standardPropMap = {}
    }
    , function(t, e) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var n = function() {
            function t(t, e) {
                this.def = t,
                this.dateProfile = e
            }
            return t.prototype.toLegacy = function() {
                var t = this.dateProfile
                  , e = this.def.toLegacy();
                return e.start = t.start.clone(),
                e.end = t.end ? t.end.clone() : null,
                e
            }
            ,
            t
        }();
        e.default = n
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , i = n(3)
          , o = n(0)
          , s = n(34)
          , l = n(209)
          , u = n(17)
          , a = function(e) {
            function t() {
                return null !== e && e.apply(this, arguments) || this
            }
            return r.__extends(t, e),
            t.prototype.isAllDay = function() {
                return !this.startTime && !this.endTime
            }
            ,
            t.prototype.buildInstances = function(t) {
                for (var e, n, r, i = this.source.calendar, o = t.getStart(), s = t.getEnd(), a = []; o.isBefore(s); )
                    this.dowHash && !this.dowHash[o.day()] || (n = (e = i.applyTimezone(o)).clone(),
                    r = null,
                    this.startTime ? n.time(this.startTime) : n.stripTime(),
                    this.endTime && (r = e.clone().time(this.endTime)),
                    a.push(new l.default(this,new u.default(n,r,i)))),
                    o.add(1, "days");
                return a
            }
            ,
            t.prototype.setDow = function(t) {
                this.dowHash || (this.dowHash = {});
                for (var e = 0; e < t.length; e++)
                    this.dowHash[t[e]] = !0
            }
            ,
            t.prototype.clone = function() {
                var t = e.prototype.clone.call(this);
                return t.startTime && (t.startTime = o.duration(this.startTime)),
                t.endTime && (t.endTime = o.duration(this.endTime)),
                this.dowHash && (t.dowHash = i.extend({}, this.dowHash)),
                t
            }
            ,
            t
        }(s.default);
        (e.default = a).prototype.applyProps = function(t) {
            var e = s.default.prototype.applyProps.call(this, t);
            return t.start && (this.startTime = o.duration(t.start)),
            t.end && (this.endTime = o.duration(t.end)),
            t.dow && this.setDow(t.dow),
            e
        }
        ,
        a.defineStandardProps({
            start: !1,
            end: !1,
            dow: !1
        })
    }
    , function(t, e) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var n = function(t, e, n) {
            this.unzonedRange = t,
            this.eventDef = e,
            n && (this.eventInstance = n)
        };
        e.default = n
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var s = n(3)
          , i = n(35)
          , o = n(18)
          , r = n(210)
          , a = n(6)
          , l = {
            start: "09:00",
            end: "17:00",
            dow: [1, 2, 3, 4, 5],
            rendering: "inverse-background"
        }
          , u = function() {
            function t(t, e) {
                this.rawComplexDef = t,
                this.calendar = e
            }
            return t.prototype.buildEventInstanceGroup = function(t, e) {
                var n, r = this.buildEventDefs(t);
                if (r.length)
                    return (n = new o.default(i.eventDefsToEventInstances(r, e))).explicitEventDef = r[0],
                    n
            }
            ,
            t.prototype.buildEventDefs = function(t) {
                var e, n = this.rawComplexDef, r = [], i = !1, o = [];
                for (!0 === n ? r = [{}] : s.isPlainObject(n) ? r = [n] : s.isArray(n) && (r = n,
                i = !0),
                e = 0; e < r.length; e++)
                    i && !r[e].dow || o.push(this.buildEventDef(t, r[e]));
                return o
            }
            ,
            t.prototype.buildEventDef = function(t, e) {
                var n = s.extend({}, l, e);
                return t && (n.start = null,
                n.end = null),
                r.default.parse(n, new a.default(this.calendar))
            }
            ,
            t
        }();
        e.default = u
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , i = function(t) {
            function e() {
                return null !== t && t.apply(this, arguments) || this
            }
            return r.__extends(e, t),
            e
        }(n(19).default);
        (e.default = i).prototype.classes = {
            widget: "fc-unthemed",
            widgetHeader: "fc-widget-header",
            widgetContent: "fc-widget-content",
            buttonGroup: "fc-button-group",
            button: "fc-button",
            cornerLeft: "fc-corner-left",
            cornerRight: "fc-corner-right",
            stateDefault: "fc-state-default",
            stateActive: "fc-state-active",
            stateDisabled: "fc-state-disabled",
            stateHover: "fc-state-hover",
            stateDown: "fc-state-down",
            popoverHeader: "fc-widget-header",
            popoverContent: "fc-widget-content",
            headerRow: "fc-widget-header",
            dayRow: "fc-widget-content",
            listView: "fc-widget-content"
        },
        i.prototype.baseIconClass = "fc-icon",
        i.prototype.iconClasses = {
            close: "fc-icon-x",
            prev: "fc-icon-left-single-arrow",
            next: "fc-icon-right-single-arrow",
            prevYear: "fc-icon-left-double-arrow",
            nextYear: "fc-icon-right-double-arrow"
        },
        i.prototype.iconOverrideOption = "buttonIcons",
        i.prototype.iconOverrideCustomButtonOption = "icon",
        i.prototype.iconOverridePrefix = "fc-icon-"
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , i = function(t) {
            function e() {
                return null !== t && t.apply(this, arguments) || this
            }
            return r.__extends(e, t),
            e
        }(n(19).default);
        (e.default = i).prototype.classes = {
            widget: "ui-widget",
            widgetHeader: "ui-widget-header",
            widgetContent: "ui-widget-content",
            buttonGroup: "fc-button-group",
            button: "ui-button",
            cornerLeft: "ui-corner-left",
            cornerRight: "ui-corner-right",
            stateDefault: "ui-state-default",
            stateActive: "ui-state-active",
            stateDisabled: "ui-state-disabled",
            stateHover: "ui-state-hover",
            stateDown: "ui-state-down",
            today: "ui-state-highlight",
            popoverHeader: "ui-widget-header",
            popoverContent: "ui-widget-content",
            headerRow: "ui-widget-header",
            dayRow: "ui-widget-content",
            listView: "ui-widget-content"
        },
        i.prototype.baseIconClass = "ui-icon",
        i.prototype.iconClasses = {
            close: "ui-icon-closethick",
            prev: "ui-icon-circle-triangle-w",
            next: "ui-icon-circle-triangle-e",
            prevYear: "ui-icon-seek-prev",
            nextYear: "ui-icon-seek-next"
        },
        i.prototype.iconOverrideOption = "themeButtonIcons",
        i.prototype.iconOverrideCustomButtonOption = "themeIcon",
        i.prototype.iconOverridePrefix = "ui-icon-"
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , i = n(3)
          , o = n(20)
          , s = n(6)
          , a = function(n) {
            function t() {
                return null !== n && n.apply(this, arguments) || this
            }
            return r.__extends(t, n),
            t.parse = function(t, e) {
                var n;
                return i.isFunction(t.events) ? n = t : i.isFunction(t) && (n = {
                    events: t
                }),
                !!n && s.default.parse.call(this, n, e)
            }
            ,
            t.prototype.fetch = function(t, n, r) {
                var i = this;
                return this.calendar.pushLoading(),
                o.default.construct(function(e) {
                    i.func.call(i.calendar, t.clone(), n.clone(), r, function(t) {
                        i.calendar.popLoading(),
                        e(i.parseEventDefs(t))
                    })
                })
            }
            ,
            t.prototype.getPrimitive = function() {
                return this.func
            }
            ,
            t.prototype.applyManualStandardProps = function(t) {
                var e = n.prototype.applyManualStandardProps.call(this, t);
                return this.func = t.events,
                e
            }
            ,
            t
        }(s.default);
        (e.default = a).defineStandardProps({
            events: !1
        })
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , c = n(3)
          , p = n(4)
          , i = n(20)
          , o = n(6)
          , s = function(t) {
            function d() {
                return null !== t && t.apply(this, arguments) || this
            }
            return r.__extends(d, t),
            d.parse = function(t, e) {
                var n;
                return "string" == typeof t.url ? n = t : "string" == typeof t && (n = {
                    url: t
                }),
                !!n && o.default.parse.call(this, n, e)
            }
            ,
            d.prototype.fetch = function(t, e, n) {
                var s = this
                  , r = this.ajaxSettings
                  , a = r.success
                  , l = r.error
                  , u = this.buildRequestParams(t, e, n);
                return this.calendar.pushLoading(),
                i.default.construct(function(i, o) {
                    c.ajax(c.extend({}, d.AJAX_DEFAULTS, r, {
                        url: s.url,
                        data: u,
                        success: function(t, e, n) {
                            var r;
                            s.calendar.popLoading(),
                            t ? (r = p.applyAll(a, s, [t, e, n]),
                            c.isArray(r) && (t = r),
                            i(s.parseEventDefs(t))) : o()
                        },
                        error: function(t, e, n) {
                            s.calendar.popLoading(),
                            p.applyAll(l, s, [t, e, n]),
                            o()
                        }
                    }))
                })
            }
            ,
            d.prototype.buildRequestParams = function(t, e, n) {
                var r, i, o, s, a = this.calendar, l = this.ajaxSettings, u = {};
                return null == (r = this.startParam) && (r = a.opt("startParam")),
                null == (i = this.endParam) && (i = a.opt("endParam")),
                null == (o = this.timezoneParam) && (o = a.opt("timezoneParam")),
                s = c.isFunction(l.data) ? l.data() : l.data || {},
                c.extend(u, s),
                u[r] = t.format(),
                u[i] = e.format(),
                n && "local" !== n && (u[o] = n),
                u
            }
            ,
            d.prototype.getPrimitive = function() {
                return this.url
            }
            ,
            d.prototype.applyMiscProps = function(t) {
                this.ajaxSettings = t
            }
            ,
            d.AJAX_DEFAULTS = {
                dataType: "json",
                cache: !1
            },
            d
        }(o.default);
        (e.default = s).defineStandardProps({
            url: !0,
            startParam: !0,
            endParam: !0,
            timezoneParam: !0
        })
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(11)
          , i = function() {
            function t() {
                this.q = [],
                this.isPaused = !1,
                this.isRunning = !1
            }
            return t.prototype.queue = function() {
                for (var t = [], e = 0; e < arguments.length; e++)
                    t[e] = arguments[e];
                this.q.push.apply(this.q, t),
                this.tryStart()
            }
            ,
            t.prototype.pause = function() {
                this.isPaused = !0
            }
            ,
            t.prototype.resume = function() {
                this.isPaused = !1,
                this.tryStart()
            }
            ,
            t.prototype.getIsIdle = function() {
                return !this.isRunning && !this.isPaused
            }
            ,
            t.prototype.tryStart = function() {
                !this.isRunning && this.canRunNext() && (this.isRunning = !0,
                this.trigger("start"),
                this.runRemaining())
            }
            ,
            t.prototype.canRunNext = function() {
                return !this.isPaused && this.q.length
            }
            ,
            t.prototype.runRemaining = function() {
                var t, e, n = this;
                do {
                    if (t = this.q.shift(),
                    (e = this.runTask(t)) && e.then)
                        return void e.then(function() {
                            n.canRunNext() && n.runRemaining()
                        })
                } while (this.canRunNext());this.trigger("stop"),
                this.isRunning = !1,
                this.tryStart()
            }
            ,
            t.prototype.runTask = function(t) {
                return t()
            }
            ,
            t
        }();
        e.default = i,
        r.default.mixInto(i)
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , i = function(n) {
            function t(t) {
                var e = n.call(this) || this;
                return e.waitsByNamespace = t || {},
                e
            }
            return r.__extends(t, n),
            t.prototype.queue = function(t, e, n) {
                var r, i = {
                    func: t,
                    namespace: e,
                    type: n
                };
                e && (r = this.waitsByNamespace[e]),
                this.waitNamespace && (e === this.waitNamespace && null != r ? this.delayWait(r) : (this.clearWait(),
                this.tryStart())),
                this.compoundTask(i) && (this.waitNamespace || null == r ? this.tryStart() : this.startWait(e, r))
            }
            ,
            t.prototype.startWait = function(t, e) {
                this.waitNamespace = t,
                this.spawnWait(e)
            }
            ,
            t.prototype.delayWait = function(t) {
                clearTimeout(this.waitId),
                this.spawnWait(t)
            }
            ,
            t.prototype.spawnWait = function(t) {
                var e = this;
                this.waitId = setTimeout(function() {
                    e.waitNamespace = null,
                    e.tryStart()
                }, t)
            }
            ,
            t.prototype.clearWait = function() {
                this.waitNamespace && (clearTimeout(this.waitId),
                this.waitId = null,
                this.waitNamespace = null)
            }
            ,
            t.prototype.canRunNext = function() {
                if (!n.prototype.canRunNext.call(this))
                    return !1;
                if (this.waitNamespace) {
                    for (var t = this.q, e = 0; e < t.length; e++)
                        if (t[e].namespace !== this.waitNamespace)
                            return !0;
                    return !1
                }
                return !0
            }
            ,
            t.prototype.runTask = function(t) {
                t.func()
            }
            ,
            t.prototype.compoundTask = function(t) {
                var e, n = this.q, r = !0;
                if (t.namespace && "destroy" === t.type)
                    for (e = n.length - 1; 0 <= e; e--)
                        switch (n[e].type) {
                        case "init":
                            r = !1;
                        case "add":
                        case "remove":
                            n.splice(e, 1)
                        }
                return r && n.push(t),
                r
            }
            ,
            t
        }(n(217).default);
        e.default = i
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var o = n(2)
          , a = n(3)
          , s = n(0)
          , l = n(4)
          , u = n(10)
          , d = n(47)
          , r = n(237)
          , c = n(35)
          , i = function(r) {
            function i(t, e) {
                var n = r.call(this) || this;
                return n.isRTL = !1,
                n.hitsNeededDepth = 0,
                n.hasAllDayBusinessHours = !1,
                n.isDatesRendered = !1,
                t && (n.view = t),
                e && (n.options = e),
                n.uid = String(i.guid++),
                n.childrenByUid = {},
                n.nextDayThreshold = s.duration(n.opt("nextDayThreshold")),
                n.isRTL = n.opt("isRTL"),
                n.fillRendererClass && (n.fillRenderer = new n.fillRendererClass(n)),
                n.eventRendererClass && (n.eventRenderer = new n.eventRendererClass(n,n.fillRenderer)),
                n.helperRendererClass && n.eventRenderer && (n.helperRenderer = new n.helperRendererClass(n,n.eventRenderer)),
                n.businessHourRendererClass && n.fillRenderer && (n.businessHourRenderer = new n.businessHourRendererClass(n,n.fillRenderer)),
                n
            }
            return o.__extends(i, r),
            i.prototype.addChild = function(t) {
                return !this.childrenByUid[t.uid] && (this.childrenByUid[t.uid] = t,
                !0)
            }
            ,
            i.prototype.removeChild = function(t) {
                return !!this.childrenByUid[t.uid] && (delete this.childrenByUid[t.uid],
                !0)
            }
            ,
            i.prototype.updateSize = function(t, e, n) {
                this.callChildren("updateSize", arguments)
            }
            ,
            i.prototype.opt = function(t) {
                return this._getView().opt(t)
            }
            ,
            i.prototype.publiclyTrigger = function() {
                for (var t = [], e = 0; e < arguments.length; e++)
                    t[e] = arguments[e];
                var n = this._getCalendar();
                return n.publiclyTrigger.apply(n, t)
            }
            ,
            i.prototype.hasPublicHandlers = function() {
                for (var t = [], e = 0; e < arguments.length; e++)
                    t[e] = arguments[e];
                var n = this._getCalendar();
                return n.hasPublicHandlers.apply(n, t)
            }
            ,
            i.prototype.executeDateRender = function(t) {
                this.dateProfile = t,
                this.renderDates(t),
                this.isDatesRendered = !0,
                this.callChildren("executeDateRender", arguments)
            }
            ,
            i.prototype.executeDateUnrender = function() {
                this.callChildren("executeDateUnrender", arguments),
                this.dateProfile = null,
                this.unrenderDates(),
                this.isDatesRendered = !1
            }
            ,
            i.prototype.renderDates = function(t) {}
            ,
            i.prototype.unrenderDates = function() {}
            ,
            i.prototype.getNowIndicatorUnit = function() {}
            ,
            i.prototype.renderNowIndicator = function(t) {
                this.callChildren("renderNowIndicator", arguments)
            }
            ,
            i.prototype.unrenderNowIndicator = function() {
                this.callChildren("unrenderNowIndicator", arguments)
            }
            ,
            i.prototype.renderBusinessHours = function(t) {
                this.businessHourRenderer && this.businessHourRenderer.render(t),
                this.callChildren("renderBusinessHours", arguments)
            }
            ,
            i.prototype.unrenderBusinessHours = function() {
                this.callChildren("unrenderBusinessHours", arguments),
                this.businessHourRenderer && this.businessHourRenderer.unrender()
            }
            ,
            i.prototype.executeEventRender = function(t) {
                this.eventRenderer ? (this.eventRenderer.rangeUpdated(),
                this.eventRenderer.render(t)) : this.renderEvents && this.renderEvents(function(t) {
                    var e, n, r, i = [];
                    for (e in t)
                        for (n = t[e].eventInstances,
                        r = 0; r < n.length; r++)
                            i.push(n[r].toLegacy());
                    return i
                }(t)),
                this.callChildren("executeEventRender", arguments)
            }
            ,
            i.prototype.executeEventUnrender = function() {
                this.callChildren("executeEventUnrender", arguments),
                this.eventRenderer ? this.eventRenderer.unrender() : this.destroyEvents && this.destroyEvents()
            }
            ,
            i.prototype.getBusinessHourSegs = function() {
                var e = this.getOwnBusinessHourSegs();
                return this.iterChildren(function(t) {
                    e.push.apply(e, t.getBusinessHourSegs())
                }),
                e
            }
            ,
            i.prototype.getOwnBusinessHourSegs = function() {
                return this.businessHourRenderer ? this.businessHourRenderer.getSegs() : []
            }
            ,
            i.prototype.getEventSegs = function() {
                var e = this.getOwnEventSegs();
                return this.iterChildren(function(t) {
                    e.push.apply(e, t.getEventSegs())
                }),
                e
            }
            ,
            i.prototype.getOwnEventSegs = function() {
                return this.eventRenderer ? this.eventRenderer.getSegs() : []
            }
            ,
            i.prototype.triggerAfterEventsRendered = function() {
                this.triggerAfterEventSegsRendered(this.getEventSegs()),
                this.publiclyTrigger("eventAfterAllRender", {
                    context: this,
                    args: [this]
                })
            }
            ,
            i.prototype.triggerAfterEventSegsRendered = function(t) {
                var n = this;
                this.hasPublicHandlers("eventAfterRender") && t.forEach(function(t) {
                    var e;
                    t.el && (e = t.footprint.getEventLegacy(),
                    n.publiclyTrigger("eventAfterRender", {
                        context: e,
                        args: [e, t.el, n]
                    }))
                })
            }
            ,
            i.prototype.triggerBeforeEventsDestroyed = function() {
                this.triggerBeforeEventSegsDestroyed(this.getEventSegs())
            }
            ,
            i.prototype.triggerBeforeEventSegsDestroyed = function(t) {
                var n = this;
                this.hasPublicHandlers("eventDestroy") && t.forEach(function(t) {
                    var e;
                    t.el && (e = t.footprint.getEventLegacy(),
                    n.publiclyTrigger("eventDestroy", {
                        context: e,
                        args: [e, t.el, n]
                    }))
                })
            }
            ,
            i.prototype.showEventsWithId = function(e) {
                this.getEventSegs().forEach(function(t) {
                    t.footprint.eventDef.id === e && t.el && t.el.css("visibility", "")
                }),
                this.callChildren("showEventsWithId", arguments)
            }
            ,
            i.prototype.hideEventsWithId = function(e) {
                this.getEventSegs().forEach(function(t) {
                    t.footprint.eventDef.id === e && t.el && t.el.css("visibility", "hidden")
                }),
                this.callChildren("hideEventsWithId", arguments)
            }
            ,
            i.prototype.renderDrag = function(e, n, r) {
                var i = !1;
                return this.iterChildren(function(t) {
                    t.renderDrag(e, n, r) && (i = !0)
                }),
                i
            }
            ,
            i.prototype.unrenderDrag = function() {
                this.callChildren("unrenderDrag", arguments)
            }
            ,
            i.prototype.renderEventResize = function(t, e, n) {
                this.callChildren("renderEventResize", arguments)
            }
            ,
            i.prototype.unrenderEventResize = function() {
                this.callChildren("unrenderEventResize", arguments)
            }
            ,
            i.prototype.renderSelectionFootprint = function(t) {
                this.renderHighlight(t),
                this.callChildren("renderSelectionFootprint", arguments)
            }
            ,
            i.prototype.unrenderSelection = function() {
                this.unrenderHighlight(),
                this.callChildren("unrenderSelection", arguments)
            }
            ,
            i.prototype.renderHighlight = function(t) {
                this.fillRenderer && this.fillRenderer.renderFootprint("highlight", t, {
                    getClasses: function() {
                        return ["fc-highlight"]
                    }
                }),
                this.callChildren("renderHighlight", arguments)
            }
            ,
            i.prototype.unrenderHighlight = function() {
                this.fillRenderer && this.fillRenderer.unrender("highlight"),
                this.callChildren("unrenderHighlight", arguments)
            }
            ,
            i.prototype.hitsNeeded = function() {
                this.hitsNeededDepth++ || this.prepareHits(),
                this.callChildren("hitsNeeded", arguments)
            }
            ,
            i.prototype.hitsNotNeeded = function() {
                this.hitsNeededDepth && !--this.hitsNeededDepth && this.releaseHits(),
                this.callChildren("hitsNotNeeded", arguments)
            }
            ,
            i.prototype.prepareHits = function() {}
            ,
            i.prototype.releaseHits = function() {}
            ,
            i.prototype.queryHit = function(t, e) {
                var n, r, i = this.childrenByUid;
                for (n in i)
                    if (r = i[n].queryHit(t, e))
                        break;
                return r
            }
            ,
            i.prototype.getSafeHitFootprint = function(t) {
                var e = this.getHitFootprint(t);
                return this.dateProfile.activeUnzonedRange.containsRange(e.unzonedRange) ? e : null
            }
            ,
            i.prototype.getHitFootprint = function(t) {}
            ,
            i.prototype.getHitEl = function(t) {}
            ,
            i.prototype.eventRangesToEventFootprints = function(t) {
                var e, n = [];
                for (e = 0; e < t.length; e++)
                    n.push.apply(n, this.eventRangeToEventFootprints(t[e]));
                return n
            }
            ,
            i.prototype.eventRangeToEventFootprints = function(t) {
                return [c.eventRangeToEventFootprint(t)]
            }
            ,
            i.prototype.eventFootprintsToSegs = function(t) {
                var e, n = [];
                for (e = 0; e < t.length; e++)
                    n.push.apply(n, this.eventFootprintToSegs(t[e]));
                return n
            }
            ,
            i.prototype.eventFootprintToSegs = function(t) {
                var e, n, r, i = t.componentFootprint.unzonedRange;
                for (e = this.componentFootprintToSegs(t.componentFootprint),
                n = 0; n < e.length; n++)
                    r = e[n],
                    i.isStart || (r.isStart = !1),
                    i.isEnd || (r.isEnd = !1),
                    r.footprint = t;
                return e
            }
            ,
            i.prototype.componentFootprintToSegs = function(t) {
                return []
            }
            ,
            i.prototype.callChildren = function(e, n) {
                this.iterChildren(function(t) {
                    t[e].apply(t, n)
                })
            }
            ,
            i.prototype.iterChildren = function(t) {
                var e, n = this.childrenByUid;
                for (e in n)
                    t(n[e])
            }
            ,
            i.prototype._getCalendar = function() {
                return this.calendar || this.view.calendar
            }
            ,
            i.prototype._getView = function() {
                return this.view
            }
            ,
            i.prototype._getDateProfile = function() {
                return this._getView().get("dateProfile")
            }
            ,
            i.prototype.buildGotoAnchorHtml = function(t, e, n) {
                var r, i, o, s;
                return a.isPlainObject(t) ? (r = t.date,
                i = t.type,
                o = t.forceOff) : r = t,
                s = {
                    date: (r = u.default(r)).format("YYYY-MM-DD"),
                    type: i || "day"
                },
                "string" == typeof e && (n = e,
                e = null),
                e = e ? " " + l.attrsToStr(e) : "",
                n = n || "",
                !o && this.opt("navLinks") ? "<a" + e + ' data-goto="' + l.htmlEscape(JSON.stringify(s)) + '">' + n + "</a>" : "<span" + e + ">" + n + "</span>"
            }
            ,
            i.prototype.getAllDayHtml = function() {
                return this.opt("allDayHtml") || l.htmlEscape(this.opt("allDayText"))
            }
            ,
            i.prototype.getDayClasses = function(t, e) {
                var n, r = this._getView(), i = [];
                return this.dateProfile.activeUnzonedRange.containsDate(t) ? (i.push("fc-" + l.dayIDs[t.day()]),
                r.isDateInOtherMonth(t, this.dateProfile) && i.push("fc-other-month"),
                n = r.calendar.getNow(),
                t.isSame(n, "day") ? (i.push("fc-today"),
                !0 !== e && i.push(r.calendar.theme.getClass("today"))) : t < n ? i.push("fc-past") : i.push("fc-future")) : i.push("fc-disabled-day"),
                i
            }
            ,
            i.prototype.formatRange = function(t, e, n, r) {
                var i = t.end;
                return e && (i = i.clone().subtract(1)),
                d.formatRange(t.start, i, n, r, this.isRTL)
            }
            ,
            i.prototype.currentRangeAs = function(t) {
                return this._getDateProfile().currentUnzonedRange.as(t)
            }
            ,
            i.prototype.computeDayRange = function(t) {
                var e = this._getCalendar()
                  , n = e.msToUtcMoment(t.startMs, !0)
                  , r = e.msToUtcMoment(t.endMs)
                  , i = +r.time()
                  , o = r.clone().stripTime();
                return i && i >= this.nextDayThreshold && o.add(1, "days"),
                o <= n && (o = n.clone().add(1, "days")),
                {
                    start: n,
                    end: o
                }
            }
            ,
            i.prototype.isMultiDayRange = function(t) {
                var e = this.computeDayRange(t);
                return 1 < e.end.diff(e.start, "days")
            }
            ,
            i.guid = 0,
            i
        }(r.default);
        e.default = i
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var s = n(3)
          , r = n(0)
          , a = n(4)
          , i = n(32)
          , o = n(238)
          , l = n(21)
          , u = n(11)
          , d = n(7)
          , c = n(239)
          , p = n(240)
          , h = n(241)
          , f = n(207)
          , g = n(31)
          , v = n(10)
          , y = n(5)
          , m = n(12)
          , b = n(17)
          , w = n(242)
          , D = n(212)
          , E = n(38)
          , S = n(49)
          , C = n(13)
          , R = n(37)
          , T = n(6)
          , M = n(51)
          , I = function() {
            function t(t, e) {
                this.loadingLevel = 0,
                this.ignoreUpdateViewSize = 0,
                this.freezeContentHeightDepth = 0,
                l.default.needed(),
                this.el = t,
                this.viewsByType = {},
                this.optionsManager = new p.default(this,e),
                this.viewSpecManager = new h.default(this.optionsManager,this),
                this.initMomentInternals(),
                this.initCurrentDate(),
                this.initEventManager(),
                this.constraints = new f.default(this.eventManager,this),
                this.constructed()
            }
            return t.prototype.constructed = function() {}
            ,
            t.prototype.getView = function() {
                return this.view
            }
            ,
            t.prototype.publiclyTrigger = function(t, e) {
                var n, r, i = this.opt(t);
                if (s.isPlainObject(e) ? (n = e.context,
                r = e.args) : s.isArray(e) && (r = e),
                null == n && (n = this.el[0]),
                r || (r = []),
                this.triggerWith(t, n, r),
                i)
                    return i.apply(n, r)
            }
            ,
            t.prototype.hasPublicHandlers = function(t) {
                return this.hasHandlers(t) || this.opt(t)
            }
            ,
            t.prototype.option = function(t, e) {
                var n;
                if ("string" == typeof t) {
                    if (void 0 === e)
                        return this.optionsManager.get(t);
                    (n = {})[t] = e,
                    this.optionsManager.add(n)
                } else
                    "object" == typeof t && this.optionsManager.add(t)
            }
            ,
            t.prototype.opt = function(t) {
                return this.optionsManager.get(t)
            }
            ,
            t.prototype.instantiateView = function(t) {
                var e = this.viewSpecManager.getViewSpec(t);
                if (!e)
                    throw new Error('View type "' + t + '" is not valid');
                return new e.class(this,e)
            }
            ,
            t.prototype.isValidViewType = function(t) {
                return Boolean(this.viewSpecManager.getViewSpec(t))
            }
            ,
            t.prototype.changeView = function(t, e) {
                e && (e.start && e.end ? this.optionsManager.recordOverrides({
                    visibleRange: e
                }) : this.currentDate = this.moment(e).stripZone()),
                this.renderView(t)
            }
            ,
            t.prototype.zoomTo = function(t, e) {
                var n;
                e = e || "day",
                n = this.viewSpecManager.getViewSpec(e) || this.viewSpecManager.getUnitViewSpec(e),
                this.currentDate = t.clone(),
                this.renderView(n ? n.type : null)
            }
            ,
            t.prototype.initCurrentDate = function() {
                var t = this.opt("defaultDate");
                this.currentDate = null != t ? this.moment(t).stripZone() : this.getNow()
            }
            ,
            t.prototype.prev = function() {
                var t = this.view
                  , e = t.dateProfileGenerator.buildPrev(t.get("dateProfile"));
                e.isValid && (this.currentDate = e.date,
                this.renderView())
            }
            ,
            t.prototype.next = function() {
                var t = this.view
                  , e = t.dateProfileGenerator.buildNext(t.get("dateProfile"));
                e.isValid && (this.currentDate = e.date,
                this.renderView())
            }
            ,
            t.prototype.prevYear = function() {
                this.currentDate.add(-1, "years"),
                this.renderView()
            }
            ,
            t.prototype.nextYear = function() {
                this.currentDate.add(1, "years"),
                this.renderView()
            }
            ,
            t.prototype.today = function() {
                this.currentDate = this.getNow(),
                this.renderView()
            }
            ,
            t.prototype.gotoDate = function(t) {
                this.currentDate = this.moment(t).stripZone(),
                this.renderView()
            }
            ,
            t.prototype.incrementDate = function(t) {
                this.currentDate.add(r.duration(t)),
                this.renderView()
            }
            ,
            t.prototype.getDate = function() {
                return this.applyTimezone(this.currentDate)
            }
            ,
            t.prototype.pushLoading = function() {
                this.loadingLevel++ || this.publiclyTrigger("loading", [!0, this.view])
            }
            ,
            t.prototype.popLoading = function() {
                --this.loadingLevel || this.publiclyTrigger("loading", [!1, this.view])
            }
            ,
            t.prototype.render = function() {
                this.contentEl ? this.elementVisible() && (this.calcSize(),
                this.updateViewSize()) : this.initialRender()
            }
            ,
            t.prototype.initialRender = function() {
                var o = this
                  , r = this.el;
                r.addClass("fc"),
                r.on("click.fc", "a[data-goto]", function(t) {
                    var e = s(t.currentTarget).data("goto")
                      , n = o.moment(e.date)
                      , r = e.type
                      , i = o.view.opt("navLink" + a.capitaliseFirstLetter(r) + "Click");
                    "function" == typeof i ? i(n, t) : ("string" == typeof i && (r = i),
                    o.zoomTo(n, r))
                }),
                this.optionsManager.watch("settingTheme", ["?theme", "?themeSystem"], function(t) {
                    var e = new (M.getThemeSystemClass(t.themeSystem || t.theme))(o.optionsManager)
                      , n = e.getClass("widget");
                    o.theme = e,
                    n && r.addClass(n)
                }, function() {
                    var t = o.theme.getClass("widget");
                    o.theme = null,
                    t && r.removeClass(t)
                }),
                this.optionsManager.watch("settingBusinessHourGenerator", ["?businessHours"], function(t) {
                    o.businessHourGenerator = new D.default(t.businessHours,o),
                    o.view && o.view.set("businessHourGenerator", o.businessHourGenerator)
                }, function() {
                    o.businessHourGenerator = null
                }),
                this.optionsManager.watch("applyingDirClasses", ["?isRTL", "?locale"], function(t) {
                    r.toggleClass("fc-ltr", !t.isRTL),
                    r.toggleClass("fc-rtl", t.isRTL)
                }),
                this.contentEl = s("<div class='fc-view-container'/>").prependTo(r),
                this.initToolbars(),
                this.renderHeader(),
                this.renderFooter(),
                this.renderView(this.opt("defaultView")),
                this.opt("handleWindowResize") && s(window).resize(this.windowResizeProxy = a.debounce(this.windowResize.bind(this), this.opt("windowResizeDelay")))
            }
            ,
            t.prototype.destroy = function() {
                this.view && this.clearView(),
                this.toolbarsManager.proxyCall("removeElement"),
                this.contentEl.remove(),
                this.el.removeClass("fc fc-ltr fc-rtl"),
                this.optionsManager.unwatch("settingTheme"),
                this.optionsManager.unwatch("settingBusinessHourGenerator"),
                this.el.off(".fc"),
                this.windowResizeProxy && (s(window).unbind("resize", this.windowResizeProxy),
                this.windowResizeProxy = null),
                l.default.unneeded()
            }
            ,
            t.prototype.elementVisible = function() {
                return this.el.is(":visible")
            }
            ,
            t.prototype.bindViewHandlers = function(e) {
                var n = this;
                e.watch("titleForCalendar", ["title"], function(t) {
                    e === n.view && n.setToolbarsTitle(t.title)
                }),
                e.watch("dateProfileForCalendar", ["dateProfile"], function(t) {
                    e === n.view && (n.currentDate = t.dateProfile.date,
                    n.updateToolbarButtons(t.dateProfile))
                })
            }
            ,
            t.prototype.unbindViewHandlers = function(t) {
                t.unwatch("titleForCalendar"),
                t.unwatch("dateProfileForCalendar")
            }
            ,
            t.prototype.renderView = function(t) {
                var e, n = this.view;
                this.freezeContentHeight(),
                n && t && n.type !== t && this.clearView(),
                !this.view && t && (e = this.view = this.viewsByType[t] || (this.viewsByType[t] = this.instantiateView(t)),
                this.bindViewHandlers(e),
                e.startBatchRender(),
                e.setElement(s("<div class='fc-view fc-" + t + "-view' />").appendTo(this.contentEl)),
                this.toolbarsManager.proxyCall("activateButton", t)),
                this.view && (this.view.get("businessHourGenerator") !== this.businessHourGenerator && this.view.set("businessHourGenerator", this.businessHourGenerator),
                this.view.setDate(this.currentDate),
                e && e.stopBatchRender()),
                this.thawContentHeight()
            }
            ,
            t.prototype.clearView = function() {
                var t = this.view;
                this.toolbarsManager.proxyCall("deactivateButton", t.type),
                this.unbindViewHandlers(t),
                t.removeElement(),
                t.unsetDate(),
                this.view = null
            }
            ,
            t.prototype.reinitView = function() {
                var t = this.view
                  , e = t.queryScroll();
                this.freezeContentHeight(),
                this.clearView(),
                this.calcSize(),
                this.renderView(t.type),
                this.view.applyScroll(e),
                this.thawContentHeight()
            }
            ,
            t.prototype.getSuggestedViewHeight = function() {
                return null == this.suggestedViewHeight && this.calcSize(),
                this.suggestedViewHeight
            }
            ,
            t.prototype.isHeightAuto = function() {
                return "auto" === this.opt("contentHeight") || "auto" === this.opt("height")
            }
            ,
            t.prototype.updateViewSize = function(t) {
                void 0 === t && (t = !1);
                var e, n = this.view;
                if (!this.ignoreUpdateViewSize && n)
                    return t && (this.calcSize(),
                    e = n.queryScroll()),
                    this.ignoreUpdateViewSize++,
                    n.updateSize(this.getSuggestedViewHeight(), this.isHeightAuto(), t),
                    this.ignoreUpdateViewSize--,
                    t && n.applyScroll(e),
                    !0
            }
            ,
            t.prototype.calcSize = function() {
                this.elementVisible() && this._calcSize()
            }
            ,
            t.prototype._calcSize = function() {
                var t = this.opt("contentHeight")
                  , e = this.opt("height");
                this.suggestedViewHeight = "number" == typeof t ? t : "function" == typeof t ? t() : "number" == typeof e ? e - this.queryToolbarsHeight() : "function" == typeof e ? e() - this.queryToolbarsHeight() : "parent" === e ? this.el.parent().height() - this.queryToolbarsHeight() : Math.round(this.contentEl.width() / Math.max(this.opt("aspectRatio"), .5))
            }
            ,
            t.prototype.windowResize = function(t) {
                t.target === window && this.view && this.view.isDatesRendered && this.updateViewSize(!0) && this.publiclyTrigger("windowResize", [this.view])
            }
            ,
            t.prototype.freezeContentHeight = function() {
                this.freezeContentHeightDepth++ || this.forceFreezeContentHeight()
            }
            ,
            t.prototype.forceFreezeContentHeight = function() {
                this.contentEl.css({
                    width: "100%",
                    height: this.contentEl.height(),
                    overflow: "hidden"
                })
            }
            ,
            t.prototype.thawContentHeight = function() {
                this.freezeContentHeightDepth--,
                this.contentEl.css({
                    width: "",
                    height: "",
                    overflow: ""
                }),
                this.freezeContentHeightDepth && this.forceFreezeContentHeight()
            }
            ,
            t.prototype.initToolbars = function() {
                this.header = new c.default(this,this.computeHeaderOptions()),
                this.footer = new c.default(this,this.computeFooterOptions()),
                this.toolbarsManager = new o.default([this.header, this.footer])
            }
            ,
            t.prototype.computeHeaderOptions = function() {
                return {
                    extraClasses: "fc-header-toolbar",
                    layout: this.opt("header")
                }
            }
            ,
            t.prototype.computeFooterOptions = function() {
                return {
                    extraClasses: "fc-footer-toolbar",
                    layout: this.opt("footer")
                }
            }
            ,
            t.prototype.renderHeader = function() {
                var t = this.header;
                t.setToolbarOptions(this.computeHeaderOptions()),
                t.render(),
                t.el && this.el.prepend(t.el)
            }
            ,
            t.prototype.renderFooter = function() {
                var t = this.footer;
                t.setToolbarOptions(this.computeFooterOptions()),
                t.render(),
                t.el && this.el.append(t.el)
            }
            ,
            t.prototype.setToolbarsTitle = function(t) {
                this.toolbarsManager.proxyCall("updateTitle", t)
            }
            ,
            t.prototype.updateToolbarButtons = function(t) {
                var e = this.getNow()
                  , n = this.view
                  , r = n.dateProfileGenerator.build(e)
                  , i = n.dateProfileGenerator.buildPrev(n.get("dateProfile"))
                  , o = n.dateProfileGenerator.buildNext(n.get("dateProfile"));
                this.toolbarsManager.proxyCall(r.isValid && !t.currentUnzonedRange.containsDate(e) ? "enableButton" : "disableButton", "today"),
                this.toolbarsManager.proxyCall(i.isValid ? "enableButton" : "disableButton", "prev"),
                this.toolbarsManager.proxyCall(o.isValid ? "enableButton" : "disableButton", "next")
            }
            ,
            t.prototype.queryToolbarsHeight = function() {
                return this.toolbarsManager.items.reduce(function(t, e) {
                    return t + (e.el ? e.el.outerHeight(!0) : 0)
                }, 0)
            }
            ,
            t.prototype.select = function(t, e) {
                this.view.select(this.buildSelectFootprint.apply(this, arguments))
            }
            ,
            t.prototype.unselect = function() {
                this.view && this.view.unselect()
            }
            ,
            t.prototype.buildSelectFootprint = function(t, e) {
                var n, r = this.moment(t).stripZone();
                return n = e ? this.moment(e).stripZone() : r.hasTime() ? r.clone().add(this.defaultTimedEventDuration) : r.clone().add(this.defaultAllDayEventDuration),
                new m.default(new y.default(r,n),!r.hasTime())
            }
            ,
            t.prototype.initMomentInternals = function() {
                var o = this;
                this.defaultAllDayEventDuration = r.duration(this.opt("defaultAllDayEventDuration")),
                this.defaultTimedEventDuration = r.duration(this.opt("defaultTimedEventDuration")),
                this.optionsManager.watch("buildingMomentLocale", ["?locale", "?monthNames", "?monthNamesShort", "?dayNames", "?dayNamesShort", "?firstDay", "?weekNumberCalculation"], function(t) {
                    var e, n = t.weekNumberCalculation, r = t.firstDay;
                    "iso" === n && (n = "ISO");
                    var i = Object.create(g.getMomentLocaleData(t.locale));
                    t.monthNames && (i._months = t.monthNames),
                    t.monthNamesShort && (i._monthsShort = t.monthNamesShort),
                    t.dayNames && (i._weekdays = t.dayNames),
                    t.dayNamesShort && (i._weekdaysShort = t.dayNamesShort),
                    null == r && "ISO" === n && (r = 1),
                    null != r && ((e = Object.create(i._week)).dow = r,
                    i._week = e),
                    "ISO" !== n && "local" !== n && "function" != typeof n || (i._fullCalendar_weekCalc = n),
                    o.localeData = i,
                    o.currentDate && o.localizeMoment(o.currentDate)
                })
            }
            ,
            t.prototype.moment = function() {
                for (var t, e = [], n = 0; n < arguments.length; n++)
                    e[n] = arguments[n];
                return "local" === this.opt("timezone") ? (t = v.default.apply(null, e)).hasTime() && t.local() : t = "UTC" === this.opt("timezone") ? v.default.utc.apply(null, e) : v.default.parseZone.apply(null, e),
                this.localizeMoment(t),
                t
            }
            ,
            t.prototype.msToMoment = function(t, e) {
                var n = v.default.utc(t);
                return e ? n.stripTime() : n = this.applyTimezone(n),
                this.localizeMoment(n),
                n
            }
            ,
            t.prototype.msToUtcMoment = function(t, e) {
                var n = v.default.utc(t);
                return e && n.stripTime(),
                this.localizeMoment(n),
                n
            }
            ,
            t.prototype.localizeMoment = function(t) {
                t._locale = this.localeData
            }
            ,
            t.prototype.getIsAmbigTimezone = function() {
                return "local" !== this.opt("timezone") && "UTC" !== this.opt("timezone")
            }
            ,
            t.prototype.applyTimezone = function(t) {
                if (!t.hasTime())
                    return t.clone();
                var e, n = this.moment(t.toArray()), r = t.time().asMilliseconds() - n.time().asMilliseconds();
                return r && (e = n.clone().add(r),
                t.time().asMilliseconds() - e.time().asMilliseconds() == 0 && (n = e)),
                n
            }
            ,
            t.prototype.footprintToDateProfile = function(t, e) {
                void 0 === e && (e = !1);
                var n, r = v.default.utc(t.unzonedRange.startMs);
                return e || (n = v.default.utc(t.unzonedRange.endMs)),
                t.isAllDay ? (r.stripTime(),
                n && n.stripTime()) : (r = this.applyTimezone(r),
                n && (n = this.applyTimezone(n))),
                new b.default(r,n,this)
            }
            ,
            t.prototype.getNow = function() {
                var t = this.opt("now");
                return "function" == typeof t && (t = t()),
                this.moment(t).stripZone()
            }
            ,
            t.prototype.humanizeDuration = function(t) {
                return t.locale(this.opt("locale")).humanize()
            }
            ,
            t.prototype.parseUnzonedRange = function(t) {
                var e = null
                  , n = null;
                return t.start && (e = this.moment(t.start).stripZone()),
                t.end && (n = this.moment(t.end).stripZone()),
                e || n ? e && n && n.isBefore(e) ? null : new y.default(e,n) : null
            }
            ,
            t.prototype.initEventManager = function() {
                var n = this
                  , r = new w.default(this)
                  , t = this.opt("eventSources") || []
                  , e = this.opt("events");
                this.eventManager = r,
                e && t.unshift(e),
                r.on("release", function(t) {
                    n.trigger("eventsReset", t)
                }),
                r.freeze(),
                t.forEach(function(t) {
                    var e = E.default.parse(t, n);
                    e && r.addSource(e)
                }),
                r.thaw()
            }
            ,
            t.prototype.requestEvents = function(t, e) {
                return this.eventManager.requestEvents(t, e, this.opt("timezone"), !this.opt("lazyFetching"))
            }
            ,
            t.prototype.getEventEnd = function(t) {
                return t.end ? t.end.clone() : this.getDefaultEventEnd(t.allDay, t.start)
            }
            ,
            t.prototype.getDefaultEventEnd = function(t, e) {
                var n = e.clone();
                return t ? n.stripTime().add(this.defaultAllDayEventDuration) : n.add(this.defaultTimedEventDuration),
                this.getIsAmbigTimezone() && n.stripZone(),
                n
            }
            ,
            t.prototype.rerenderEvents = function() {
                this.view.flash("displayingEvents")
            }
            ,
            t.prototype.refetchEvents = function() {
                this.eventManager.refetchAllSources()
            }
            ,
            t.prototype.renderEvents = function(t, e) {
                this.eventManager.freeze();
                for (var n = 0; n < t.length; n++)
                    this.renderEvent(t[n], e);
                this.eventManager.thaw()
            }
            ,
            t.prototype.renderEvent = function(t, e) {
                void 0 === e && (e = !1);
                var n = this.eventManager
                  , r = S.default.parse(t, t.source || n.stickySource);
                r && n.addEventDef(r, e)
            }
            ,
            t.prototype.removeEvents = function(t) {
                var e, n = this.eventManager, r = [], i = {};
                if (null == t)
                    n.removeAllEventDefs();
                else {
                    for (n.getEventInstances().forEach(function(t) {
                        r.push(t.toLegacy())
                    }),
                    r = P(r, t),
                    e = 0; e < r.length; e++)
                        i[this.eventManager.getEventDefByUid(r[e]._id).id] = !0;
                    for (e in n.freeze(),
                    i)
                        n.removeEventDefsById(e);
                    n.thaw()
                }
            }
            ,
            t.prototype.clientEvents = function(t) {
                var e = [];
                return this.eventManager.getEventInstances().forEach(function(t) {
                    e.push(t.toLegacy())
                }),
                P(e, t)
            }
            ,
            t.prototype.updateEvents = function(t) {
                this.eventManager.freeze();
                for (var e = 0; e < t.length; e++)
                    this.updateEvent(t[e]);
                this.eventManager.thaw()
            }
            ,
            t.prototype.updateEvent = function(t) {
                var e, n, r = this.eventManager.getEventDefByUid(t._id);
                r instanceof C.default && (e = r.buildInstance(),
                n = R.default.createFromRawProps(e, t, null),
                this.eventManager.mutateEventsWithId(r.id, n))
            }
            ,
            t.prototype.getEventSources = function() {
                return this.eventManager.otherSources.slice()
            }
            ,
            t.prototype.getEventSourceById = function(t) {
                return this.eventManager.getSourceById(T.default.normalizeId(t))
            }
            ,
            t.prototype.addEventSource = function(t) {
                var e = E.default.parse(t, this);
                e && this.eventManager.addSource(e)
            }
            ,
            t.prototype.removeEventSources = function(t) {
                var e, n, r = this.eventManager;
                if (null == t)
                    this.eventManager.removeAllSources();
                else {
                    for (e = r.multiQuerySources(t),
                    r.freeze(),
                    n = 0; n < e.length; n++)
                        r.removeSource(e[n]);
                    r.thaw()
                }
            }
            ,
            t.prototype.removeEventSource = function(t) {
                var e, n = this.eventManager, r = n.querySources(t);
                for (n.freeze(),
                e = 0; e < r.length; e++)
                    n.removeSource(r[e]);
                n.thaw()
            }
            ,
            t.prototype.refetchEventSources = function(t) {
                var e, n = this.eventManager, r = n.multiQuerySources(t);
                for (n.freeze(),
                e = 0; e < r.length; e++)
                    n.refetchSource(r[e]);
                n.thaw()
            }
            ,
            t.defaults = i.globalDefaults,
            t.englishDefaults = i.englishDefaults,
            t.rtlDefaults = i.rtlDefaults,
            t
        }();
        function P(t, e) {
            return null == e ? t : s.isFunction(e) ? t.filter(e) : (e += "",
            t.filter(function(t) {
                return t.id == e || t._id === e
            }))
        }
        e.default = I,
        u.default.mixInto(I),
        d.default.mixInto(I)
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var p = n(0)
          , c = n(4)
          , h = n(5)
          , r = function() {
            function t(t) {
                this._view = t
            }
            return t.prototype.opt = function(t) {
                return this._view.opt(t)
            }
            ,
            t.prototype.trimHiddenDays = function(t) {
                return this._view.trimHiddenDays(t)
            }
            ,
            t.prototype.msToUtcMoment = function(t, e) {
                return this._view.calendar.msToUtcMoment(t, e)
            }
            ,
            t.prototype.buildPrev = function(t) {
                var e = t.date.clone().startOf(t.currentRangeUnit).subtract(t.dateIncrement);
                return this.build(e, -1)
            }
            ,
            t.prototype.buildNext = function(t) {
                var e = t.date.clone().startOf(t.currentRangeUnit).add(t.dateIncrement);
                return this.build(e, 1)
            }
            ,
            t.prototype.build = function(t, e, n) {
                void 0 === n && (n = !1);
                var r, i, o, s, a, l, u, d, c = !t.hasTime();
                return r = this.buildValidRange(),
                r = this.trimHiddenDays(r),
                n && (t = this.msToUtcMoment(r.constrainDate(t), c)),
                s = this.buildCurrentRangeInfo(t, e),
                a = /^(year|month|week|day)$/.test(s.unit),
                l = this.buildRenderRange(this.trimHiddenDays(s.unzonedRange), s.unit, a),
                u = (l = this.trimHiddenDays(l)).clone(),
                this.opt("showNonCurrentDates") || (u = u.intersect(s.unzonedRange)),
                i = p.duration(this.opt("minTime")),
                o = p.duration(this.opt("maxTime")),
                (u = (u = this.adjustActiveRange(u, i, o)).intersect(r)) && (t = this.msToUtcMoment(u.constrainDate(t), c)),
                d = s.unzonedRange.intersectsWith(r),
                {
                    validUnzonedRange: r,
                    currentUnzonedRange: s.unzonedRange,
                    currentRangeUnit: s.unit,
                    isRangeAllDay: a,
                    activeUnzonedRange: u,
                    renderUnzonedRange: l,
                    minTime: i,
                    maxTime: o,
                    isValid: d,
                    date: t,
                    dateIncrement: this.buildDateIncrement(s.duration)
                }
            }
            ,
            t.prototype.buildValidRange = function() {
                return this._view.getUnzonedRangeOption("validRange", this._view.calendar.getNow()) || new h.default
            }
            ,
            t.prototype.buildCurrentRangeInfo = function(t, e) {
                var n, r = this._view.viewSpec, i = null, o = null, s = null;
                return r.duration ? (i = r.duration,
                o = r.durationUnit,
                s = this.buildRangeFromDuration(t, e, i, o)) : (n = this.opt("dayCount")) ? (o = "day",
                s = this.buildRangeFromDayCount(t, e, n)) : (s = this.buildCustomVisibleRange(t)) ? o = c.computeGreatestUnit(s.getStart(), s.getEnd()) : (i = this.getFallbackDuration(),
                o = c.computeGreatestUnit(i),
                s = this.buildRangeFromDuration(t, e, i, o)),
                {
                    duration: i,
                    unit: o,
                    unzonedRange: s
                }
            }
            ,
            t.prototype.getFallbackDuration = function() {
                return p.duration({
                    days: 1
                })
            }
            ,
            t.prototype.adjustActiveRange = function(t, e, n) {
                var r = t.getStart()
                  , i = t.getEnd();
                return this._view.usesMinMaxTime && (e < 0 && r.time(0).add(e),
                864e5 < n && i.time(n - 864e5)),
                new h.default(r,i)
            }
            ,
            t.prototype.buildRangeFromDuration = function(t, e, n, r) {
                var i, o, s, a, l, u = this.opt("dateAlignment");
                function d() {
                    s = t.clone().startOf(u),
                    a = s.clone().add(n),
                    l = new h.default(s,a)
                }
                return u || ((i = this.opt("dateIncrement")) ? (o = p.duration(i),
                u = o < n ? c.computeDurationGreatestUnit(o, i) : r) : u = r),
                n.as("days") <= 1 && this._view.isHiddenDay(s) && (s = this._view.skipHiddenDays(s, e)).startOf("day"),
                d(),
                this.trimHiddenDays(l) || (t = this._view.skipHiddenDays(t, e),
                d()),
                l
            }
            ,
            t.prototype.buildRangeFromDayCount = function(t, e, n) {
                var r, i = this.opt("dateAlignment"), o = 0, s = t.clone();
                for (i && s.startOf(i),
                s.startOf("day"),
                r = (s = this._view.skipHiddenDays(s, e)).clone(); r.add(1, "day"),
                this._view.isHiddenDay(r) || o++,
                o < n; )
                    ;
                return new h.default(s,r)
            }
            ,
            t.prototype.buildCustomVisibleRange = function(t) {
                var e = this._view.getUnzonedRangeOption("visibleRange", this._view.calendar.applyTimezone(t));
                return !e || null != e.startMs && null != e.endMs ? e : null
            }
            ,
            t.prototype.buildRenderRange = function(t, e, n) {
                return t.clone()
            }
            ,
            t.prototype.buildDateIncrement = function(t) {
                var e, n = this.opt("dateIncrement");
                return n ? p.duration(n) : (e = this.opt("dateAlignment")) ? p.duration(1, e) : t || p.duration({
                    days: 1
                })
            }
            ,
            t
        }();
        e.default = r
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , u = n(3)
          , d = n(0)
          , c = n(16)
          , p = n(4)
          , o = n(10)
          , i = n(7)
          , h = n(23)
          , s = n(13)
          , f = n(18)
          , a = n(6)
          , l = function(e) {
            function t() {
                var t = null !== e && e.apply(this, arguments) || this;
                return t.isDragging = !1,
                t
            }
            return r.__extends(t, e),
            t.prototype.end = function() {
                this.dragListener && this.dragListener.endInteraction()
            }
            ,
            t.prototype.bindToDocument = function() {
                this.listenTo(u(document), {
                    dragstart: this.handleDragStart,
                    sortstart: this.handleDragStart
                })
            }
            ,
            t.prototype.unbindFromDocument = function() {
                this.stopListeningTo(u(document))
            }
            ,
            t.prototype.handleDragStart = function(t, e) {
                var n, r;
                this.opt("droppable") && (n = u((e ? e.item : null) || t.target),
                r = this.opt("dropAccept"),
                (u.isFunction(r) ? r.call(n[0], n) : n.is(r)) && (this.isDragging || this.listenToExternalDrag(n, t, e)))
            }
            ,
            t.prototype.listenToExternalDrag = function(e, t, n) {
                var i, o = this, s = this.component, a = this.view, l = function(t) {
                    var e, n, r, i, o = c.dataAttrPrefix;
                    o && (o += "-");
                    (e = t.data(o + "event") || null) && (e = "object" == typeof e ? u.extend({}, e) : {},
                    null == (n = e.start) && (n = e.time),
                    r = e.duration,
                    i = e.stick,
                    delete e.start,
                    delete e.time,
                    delete e.duration,
                    delete e.stick);
                    null == n && (n = t.data(o + "start"));
                    null == n && (n = t.data(o + "time"));
                    null == r && (r = t.data(o + "duration"));
                    null == i && (i = t.data(o + "stick"));
                    return n = null != n ? d.duration(n) : null,
                    r = null != r ? d.duration(r) : null,
                    i = Boolean(i),
                    {
                        eventProps: e,
                        startTime: n,
                        duration: r,
                        stick: i
                    }
                }(e);
                (this.dragListener = new h.default(s,{
                    interactionStart: function() {
                        o.isDragging = !0
                    },
                    hitOver: function(t) {
                        var e, n = !0, r = t.component.getSafeHitFootprint(t);
                        r && (i = o.computeExternalDrop(r, l)) ? (e = new f.default(i.buildInstances()),
                        n = l.eventProps ? s.isEventInstanceGroupAllowed(e) : s.isExternalInstanceGroupAllowed(e)) : n = !1,
                        n || (i = null,
                        p.disableCursor()),
                        i && s.renderDrag(s.eventRangesToEventFootprints(e.sliceRenderRanges(s.dateProfile.renderUnzonedRange, a.calendar)))
                    },
                    hitOut: function() {
                        i = null
                    },
                    hitDone: function() {
                        p.enableCursor(),
                        s.unrenderDrag()
                    },
                    interactionEnd: function(t) {
                        i && a.reportExternalDrop(i, Boolean(l.eventProps), Boolean(l.stick), e, t, n),
                        o.isDragging = !1,
                        o.dragListener = null
                    }
                })).startDrag(t)
            }
            ,
            t.prototype.computeExternalDrop = function(t, e) {
                var n, r = this.view.calendar, i = o.default.utc(t.unzonedRange.startMs).stripZone();
                return t.isAllDay && (e.startTime ? i.time(e.startTime) : i.stripTime()),
                e.duration && (n = i.clone().add(e.duration)),
                i = r.applyTimezone(i),
                n && (n = r.applyTimezone(n)),
                s.default.parse(u.extend({}, e.eventProps, {
                    start: i,
                    end: n
                }), new a.default(r))
            }
            ,
            t
        }(n(15).default);
        e.default = l,
        i.default.mixInto(l),
        c.dataAttrPrefix = ""
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var i = n(2)
          , o = n(3)
          , v = n(4)
          , a = n(37)
          , l = n(50)
          , s = n(23)
          , r = function(r) {
            function t(t, e) {
                var n = r.call(this, t) || this;
                return n.isResizing = !1,
                n.eventPointing = e,
                n
            }
            return i.__extends(t, r),
            t.prototype.end = function() {
                this.dragListener && this.dragListener.endInteraction()
            }
            ,
            t.prototype.bindToEl = function(t) {
                var e = this.component;
                e.bindSegHandlerToEl(t, "mousedown", this.handleMouseDown.bind(this)),
                e.bindSegHandlerToEl(t, "touchstart", this.handleTouchStart.bind(this))
            }
            ,
            t.prototype.handleMouseDown = function(t, e) {
                this.component.canStartResize(t, e) && this.buildDragListener(t, o(e.target).is(".fc-start-resizer")).startInteraction(e, {
                    distance: 5
                })
            }
            ,
            t.prototype.handleTouchStart = function(t, e) {
                this.component.canStartResize(t, e) && this.buildDragListener(t, o(e.target).is(".fc-start-resizer")).startInteraction(e)
            }
            ,
            t.prototype.buildDragListener = function(a, l) {
                var e, u, d = this, c = this.component, p = this.view, h = p.calendar, f = h.eventManager, n = a.el, g = a.footprint.eventDef, r = a.footprint.eventInstance;
                return this.dragListener = new s.default(c,{
                    scroll: this.opt("dragScroll"),
                    subjectEl: n,
                    interactionStart: function() {
                        e = !1
                    },
                    dragStart: function(t) {
                        e = !0,
                        d.eventPointing.handleMouseout(a, t),
                        d.segResizeStart(a, t)
                    },
                    hitOver: function(t, e, n) {
                        var r, i = !0, o = c.getSafeHitFootprint(n), s = c.getSafeHitFootprint(t);
                        o && s && (u = l ? d.computeEventStartResizeMutation(o, s, a.footprint) : d.computeEventEndResizeMutation(o, s, a.footprint)) ? (r = f.buildMutatedEventInstanceGroup(g.id, u),
                        i = c.isEventInstanceGroupAllowed(r)) : i = !1,
                        i ? u.isEmpty() && (u = null) : (u = null,
                        v.disableCursor()),
                        u && (p.hideEventsWithId(a.footprint.eventDef.id),
                        p.renderEventResize(c.eventRangesToEventFootprints(r.sliceRenderRanges(c.dateProfile.renderUnzonedRange, h)), a))
                    },
                    hitOut: function() {
                        u = null
                    },
                    hitDone: function() {
                        p.unrenderEventResize(a),
                        p.showEventsWithId(a.footprint.eventDef.id),
                        v.enableCursor()
                    },
                    interactionEnd: function(t) {
                        e && d.segResizeStop(a, t),
                        u && p.reportEventResize(r, u, n, t),
                        d.dragListener = null
                    }
                })
            }
            ,
            t.prototype.segResizeStart = function(t, e) {
                this.isResizing = !0,
                this.component.publiclyTrigger("eventResizeStart", {
                    context: t.el[0],
                    args: [t.footprint.getEventLegacy(), e, {}, this.view]
                })
            }
            ,
            t.prototype.segResizeStop = function(t, e) {
                this.isResizing = !1,
                this.component.publiclyTrigger("eventResizeStop", {
                    context: t.el[0],
                    args: [t.footprint.getEventLegacy(), e, {}, this.view]
                })
            }
            ,
            t.prototype.computeEventStartResizeMutation = function(t, e, n) {
                var r, i, o = n.componentFootprint.unzonedRange, s = this.component.diffDates(e.unzonedRange.getStart(), t.unzonedRange.getStart());
                return o.getStart().add(s) < o.getEnd() && ((r = new l.default).setStartDelta(s),
                (i = new a.default).setDateMutation(r),
                i)
            }
            ,
            t.prototype.computeEventEndResizeMutation = function(t, e, n) {
                var r, i, o = n.componentFootprint.unzonedRange, s = this.component.diffDates(e.unzonedRange.getEnd(), t.unzonedRange.getEnd());
                return o.getEnd().add(s) > o.getStart() && ((r = new l.default).setEndDelta(s),
                (i = new a.default).setDateMutation(r),
                i)
            }
            ,
            t
        }(n(15).default);
        e.default = r
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var i = n(2)
          , y = n(4)
          , o = n(37)
          , u = n(50)
          , s = n(54)
          , m = n(23)
          , b = n(244)
          , r = function(r) {
            function t(t, e) {
                var n = r.call(this, t) || this;
                return n.isDragging = !1,
                n.eventPointing = e,
                n
            }
            return i.__extends(t, r),
            t.prototype.end = function() {
                this.dragListener && this.dragListener.endInteraction()
            }
            ,
            t.prototype.getSelectionDelay = function() {
                var t = this.opt("eventLongPressDelay");
                return null == t && (t = this.opt("longPressDelay")),
                t
            }
            ,
            t.prototype.bindToEl = function(t) {
                var e = this.component;
                e.bindSegHandlerToEl(t, "mousedown", this.handleMousedown.bind(this)),
                e.bindSegHandlerToEl(t, "touchstart", this.handleTouchStart.bind(this))
            }
            ,
            t.prototype.handleMousedown = function(t, e) {
                !this.component.shouldIgnoreMouse() && this.component.canStartDrag(t, e) && this.buildDragListener(t).startInteraction(e, {
                    distance: 5
                })
            }
            ,
            t.prototype.handleTouchStart = function(t, e) {
                var n = this.component
                  , r = {
                    delay: this.view.isEventDefSelected(t.footprint.eventDef) ? 0 : this.getSelectionDelay()
                };
                n.canStartDrag(t, e) ? this.buildDragListener(t).startInteraction(e, r) : n.canStartSelection(t, e) && this.buildSelectListener(t).startInteraction(e, r)
            }
            ,
            t.prototype.buildSelectListener = function(t) {
                var e = this
                  , n = this.view
                  , r = t.footprint.eventDef
                  , i = t.footprint.eventInstance;
                if (this.dragListener)
                    return this.dragListener;
                var o = this.dragListener = new s.default({
                    dragStart: function(t) {
                        o.isTouch && !n.isEventDefSelected(r) && i && n.selectEventInstance(i)
                    },
                    interactionEnd: function(t) {
                        e.dragListener = null
                    }
                });
                return o
            }
            ,
            t.prototype.buildDragListener = function(a) {
                var e, l, u, d = this, c = this.component, p = this.view, h = p.calendar, f = h.eventManager, n = a.el, g = a.footprint.eventDef, r = a.footprint.eventInstance;
                if (this.dragListener)
                    return this.dragListener;
                var v = this.dragListener = new m.default(p,{
                    scroll: this.opt("dragScroll"),
                    subjectEl: n,
                    subjectCenter: !0,
                    interactionStart: function(t) {
                        a.component = c,
                        e = !1,
                        (l = new b.default(a.el,{
                            additionalClass: "fc-dragging",
                            parentEl: p.el,
                            opacity: v.isTouch ? null : d.opt("dragOpacity"),
                            revertDuration: d.opt("dragRevertDuration"),
                            zIndex: 2
                        })).hide(),
                        l.start(t)
                    },
                    dragStart: function(t) {
                        v.isTouch && !p.isEventDefSelected(g) && r && p.selectEventInstance(r),
                        e = !0,
                        d.eventPointing.handleMouseout(a, t),
                        d.segDragStart(a, t),
                        p.hideEventsWithId(a.footprint.eventDef.id)
                    },
                    hitOver: function(t, e, n) {
                        var r, i, o, s = !0;
                        a.hit && (n = a.hit),
                        r = n.component.getSafeHitFootprint(n),
                        i = t.component.getSafeHitFootprint(t),
                        r && i && (u = d.computeEventDropMutation(r, i, g)) ? (o = f.buildMutatedEventInstanceGroup(g.id, u),
                        s = c.isEventInstanceGroupAllowed(o)) : s = !1,
                        s || (u = null,
                        y.disableCursor()),
                        u && p.renderDrag(c.eventRangesToEventFootprints(o.sliceRenderRanges(c.dateProfile.renderUnzonedRange, h)), a, v.isTouch) ? l.hide() : l.show(),
                        e && (u = null)
                    },
                    hitOut: function() {
                        p.unrenderDrag(a),
                        l.show(),
                        u = null
                    },
                    hitDone: function() {
                        y.enableCursor()
                    },
                    interactionEnd: function(t) {
                        delete a.component,
                        l.stop(!u, function() {
                            e && (p.unrenderDrag(a),
                            d.segDragStop(a, t)),
                            p.showEventsWithId(a.footprint.eventDef.id),
                            u && p.reportEventDrop(r, u, n, t)
                        }),
                        d.dragListener = null
                    }
                });
                return v
            }
            ,
            t.prototype.segDragStart = function(t, e) {
                this.isDragging = !0,
                this.component.publiclyTrigger("eventDragStart", {
                    context: t.el[0],
                    args: [t.footprint.getEventLegacy(), e, {}, this.view]
                })
            }
            ,
            t.prototype.segDragStop = function(t, e) {
                this.isDragging = !1,
                this.component.publiclyTrigger("eventDragStop", {
                    context: t.el[0],
                    args: [t.footprint.getEventLegacy(), e, {}, this.view]
                })
            }
            ,
            t.prototype.computeEventDropMutation = function(t, e, n) {
                var r = new o.default;
                return r.setDateMutation(this.computeEventDateMutation(t, e)),
                r
            }
            ,
            t.prototype.computeEventDateMutation = function(t, e) {
                var n, r, i = t.unzonedRange.getStart(), o = e.unzonedRange.getStart(), s = !1, a = !1, l = !1;
                return t.isAllDay !== e.isAllDay && (s = !0,
                e.isAllDay ? (l = !0,
                i.stripTime()) : a = !0),
                n = this.component.diffDates(o, i),
                (r = new u.default).clearEnd = s,
                r.forceTimed = a,
                r.forceAllDay = l,
                r.setDateDelta(n),
                r
            }
            ,
            t
        }(n(15).default);
        e.default = r
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , l = n(4)
          , i = n(23)
          , o = n(12)
          , s = n(5)
          , a = function(n) {
            function t(t) {
                var e = n.call(this, t) || this;
                return e.dragListener = e.buildDragListener(),
                e
            }
            return r.__extends(t, n),
            t.prototype.end = function() {
                this.dragListener.endInteraction()
            }
            ,
            t.prototype.getDelay = function() {
                var t = this.opt("selectLongPressDelay");
                return null == t && (t = this.opt("longPressDelay")),
                t
            }
            ,
            t.prototype.bindToEl = function(t) {
                var e = this
                  , n = this.component
                  , r = this.dragListener;
                n.bindDateHandlerToEl(t, "mousedown", function(t) {
                    e.opt("selectable") && !n.shouldIgnoreMouse() && r.startInteraction(t, {
                        distance: e.opt("selectMinDistance")
                    })
                }),
                n.bindDateHandlerToEl(t, "touchstart", function(t) {
                    e.opt("selectable") && !n.shouldIgnoreTouch() && r.startInteraction(t, {
                        delay: e.getDelay()
                    })
                }),
                l.preventSelection(t)
            }
            ,
            t.prototype.buildDragListener = function() {
                var o, s = this, a = this.component;
                return new i.default(a,{
                    scroll: this.opt("dragScroll"),
                    interactionStart: function() {
                        o = null
                    },
                    dragStart: function(t) {
                        s.view.unselect(t)
                    },
                    hitOver: function(t, e, n) {
                        var r, i;
                        n && (r = a.getSafeHitFootprint(n),
                        i = a.getSafeHitFootprint(t),
                        (o = r && i ? s.computeSelection(r, i) : null) ? a.renderSelectionFootprint(o) : !1 === o && l.disableCursor())
                    },
                    hitOut: function() {
                        o = null,
                        a.unrenderSelection()
                    },
                    hitDone: function() {
                        l.enableCursor()
                    },
                    interactionEnd: function(t, e) {
                        !e && o && s.view.reportSelection(o, t)
                    }
                })
            }
            ,
            t.prototype.computeSelection = function(t, e) {
                var n = this.computeSelectionFootprint(t, e);
                return !(n && !this.isSelectionFootprintAllowed(n)) && n
            }
            ,
            t.prototype.computeSelectionFootprint = function(t, e) {
                var n = [t.unzonedRange.startMs, t.unzonedRange.endMs, e.unzonedRange.startMs, e.unzonedRange.endMs];
                return n.sort(l.compareNumbers),
                new o.default(new s.default(n[0],n[3]),t.isAllDay)
            }
            ,
            t.prototype.isSelectionFootprintAllowed = function(t) {
                return this.component.dateProfile.validUnzonedRange.containsRange(t.unzonedRange) && this.view.calendar.constraints.isSelectionFootprintAllowed(t)
            }
            ,
            t
        }(n(15).default);
        e.default = a
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r, i, o = n(2), s = n(0), l = n(3), u = n(4), d = n(39), a = n(41), c = n(227), p = n(61), h = function(a) {
            function t(t, e) {
                var n = a.call(this, t, e) || this;
                return n.usesMinMaxTime = !0,
                n.timeGrid = n.instantiateTimeGrid(),
                n.addChild(n.timeGrid),
                n.opt("allDaySlot") && (n.dayGrid = n.instantiateDayGrid(),
                n.addChild(n.dayGrid)),
                n.scroller = new d.default({
                    overflowX: "hidden",
                    overflowY: "auto"
                }),
                n
            }
            return o.__extends(t, a),
            t.prototype.instantiateTimeGrid = function() {
                var t = new this.timeGridClass(this);
                return u.copyOwnProps(r, t),
                t
            }
            ,
            t.prototype.instantiateDayGrid = function() {
                var t = new this.dayGridClass(this);
                return u.copyOwnProps(i, t),
                t
            }
            ,
            t.prototype.renderSkeleton = function() {
                var t, e;
                this.el.addClass("fc-agenda-view").html(this.renderSkeletonHtml()),
                this.scroller.render(),
                t = this.scroller.el.addClass("fc-time-grid-container"),
                e = l('<div class="fc-time-grid" />').appendTo(t),
                this.el.find(".fc-body > tr > td").append(t),
                this.timeGrid.headContainerEl = this.el.find(".fc-head-container"),
                this.timeGrid.setElement(e),
                this.dayGrid && (this.dayGrid.setElement(this.el.find(".fc-day-grid")),
                this.dayGrid.bottomCoordPadding = this.dayGrid.el.next("hr").outerHeight())
            }
            ,
            t.prototype.unrenderSkeleton = function() {
                this.timeGrid.removeElement(),
                this.dayGrid && this.dayGrid.removeElement(),
                this.scroller.destroy()
            }
            ,
            t.prototype.renderSkeletonHtml = function() {
                var t = this.calendar.theme;
                return '<table class="' + t.getClass("tableGrid") + '">' + (this.opt("columnHeader") ? '<thead class="fc-head"><tr><td class="fc-head-container ' + t.getClass("widgetHeader") + '">&nbsp;</td></tr></thead>' : "") + '<tbody class="fc-body"><tr><td class="' + t.getClass("widgetContent") + '">' + (this.dayGrid ? '<div class="fc-day-grid"/><hr class="fc-divider ' + t.getClass("widgetHeader") + '"/>' : "") + "</td></tr></tbody></table>"
            }
            ,
            t.prototype.axisStyleAttr = function() {
                return null != this.axisWidth ? 'style="width:' + this.axisWidth + 'px"' : ""
            }
            ,
            t.prototype.getNowIndicatorUnit = function() {
                return this.timeGrid.getNowIndicatorUnit()
            }
            ,
            t.prototype.updateSize = function(t, e, n) {
                var r, i, o;
                if (a.prototype.updateSize.call(this, t, e, n),
                this.axisWidth = u.matchCellWidths(this.el.find(".fc-axis")),
                this.timeGrid.colEls) {
                    var s = this.el.find(".fc-row:not(.fc-scroller *)");
                    this.timeGrid.bottomRuleEl.hide(),
                    this.scroller.clear(),
                    u.uncompensateScroll(s),
                    this.dayGrid && (this.dayGrid.removeSegPopover(),
                    (r = this.opt("eventLimit")) && "number" != typeof r && (r = 5),
                    r && this.dayGrid.limitRows(r)),
                    e || (i = this.computeScrollerHeight(t),
                    this.scroller.setHeight(i),
                    ((o = this.scroller.getScrollbarWidths()).left || o.right) && (u.compensateScroll(s, o),
                    i = this.computeScrollerHeight(t),
                    this.scroller.setHeight(i)),
                    this.scroller.lockOverflow(o),
                    this.timeGrid.getTotalSlatHeight() < i && this.timeGrid.bottomRuleEl.show())
                } else
                    e || (i = this.computeScrollerHeight(t),
                    this.scroller.setHeight(i))
            }
            ,
            t.prototype.computeScrollerHeight = function(t) {
                return t - u.subtractInnerElHeight(this.el, this.scroller.el)
            }
            ,
            t.prototype.computeInitialDateScroll = function() {
                var t = s.duration(this.opt("scrollTime"))
                  , e = this.timeGrid.computeTimeTop(t);
                return (e = Math.ceil(e)) && e++,
                {
                    top: e
                }
            }
            ,
            t.prototype.queryDateScroll = function() {
                return {
                    top: this.scroller.getScrollTop()
                }
            }
            ,
            t.prototype.applyDateScroll = function(t) {
                void 0 !== t.top && this.scroller.setScrollTop(t.top)
            }
            ,
            t.prototype.getHitFootprint = function(t) {
                return t.component.getHitFootprint(t)
            }
            ,
            t.prototype.getHitEl = function(t) {
                return t.component.getHitEl(t)
            }
            ,
            t.prototype.executeEventRender = function(t) {
                var e, n, r = {}, i = {};
                for (e in t)
                    (n = t[e]).getEventDef().isAllDay() ? r[e] = n : i[e] = n;
                this.timeGrid.executeEventRender(i),
                this.dayGrid && this.dayGrid.executeEventRender(r)
            }
            ,
            t.prototype.renderDrag = function(t, e, n) {
                var r = f(t)
                  , i = !1;
                return i = this.timeGrid.renderDrag(r.timed, e, n),
                this.dayGrid && (i = this.dayGrid.renderDrag(r.allDay, e, n) || i),
                i
            }
            ,
            t.prototype.renderEventResize = function(t, e, n) {
                var r = f(t);
                this.timeGrid.renderEventResize(r.timed, e, n),
                this.dayGrid && this.dayGrid.renderEventResize(r.allDay, e, n)
            }
            ,
            t.prototype.renderSelectionFootprint = function(t) {
                t.isAllDay ? this.dayGrid && this.dayGrid.renderSelectionFootprint(t) : this.timeGrid.renderSelectionFootprint(t)
            }
            ,
            t
        }(a.default);
        function f(t) {
            var e, n = [], r = [];
            for (e = 0; e < t.length; e++)
                t[e].componentFootprint.isAllDay ? n.push(t[e]) : r.push(t[e]);
            return {
                allDay: n,
                timed: r
            }
        }
        (e.default = h).prototype.timeGridClass = c.default,
        h.prototype.dayGridClass = p.default,
        r = {
            renderHeadIntroHtml: function() {
                var t, e = this.view, n = e.calendar, r = n.msToUtcMoment(this.dateProfile.renderUnzonedRange.startMs, !0);
                return this.opt("weekNumbers") ? (t = r.format(this.opt("smallWeekFormat")),
                '<th class="fc-axis fc-week-number ' + n.theme.getClass("widgetHeader") + '" ' + e.axisStyleAttr() + ">" + e.buildGotoAnchorHtml({
                    date: r,
                    type: "week",
                    forceOff: 1 < this.colCnt
                }, u.htmlEscape(t)) + "</th>") : '<th class="fc-axis ' + n.theme.getClass("widgetHeader") + '" ' + e.axisStyleAttr() + "></th>"
            },
            renderBgIntroHtml: function() {
                var t = this.view;
                return '<td class="fc-axis ' + t.calendar.theme.getClass("widgetContent") + '" ' + t.axisStyleAttr() + "></td>"
            },
            renderIntroHtml: function() {
                return '<td class="fc-axis" ' + this.view.axisStyleAttr() + "></td>"
            }
        },
        i = {
            renderBgIntroHtml: function() {
                var t = this.view;
                return '<td class="fc-axis ' + t.calendar.theme.getClass("widgetContent") + '" ' + t.axisStyleAttr() + "><span>" + t.getAllDayHtml() + "</span></td>"
            },
            renderIntroHtml: function() {
                return '<td class="fc-axis" ' + this.view.axisStyleAttr() + "></td>"
            }
        }
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var i = n(2)
          , o = n(3)
          , c = n(0)
          , p = n(4)
          , r = n(40)
          , s = n(56)
          , a = n(60)
          , l = n(55)
          , u = n(53)
          , d = n(5)
          , h = n(12)
          , f = n(246)
          , g = n(247)
          , v = n(248)
          , y = [{
            hours: 1
        }, {
            minutes: 30
        }, {
            minutes: 15
        }, {
            seconds: 30
        }, {
            seconds: 15
        }]
          , m = function(r) {
            function t(t) {
                var e = r.call(this, t) || this;
                return e.processOptions(),
                e
            }
            return i.__extends(t, r),
            t.prototype.componentFootprintToSegs = function(t) {
                var e, n = this.sliceRangeByTimes(t.unzonedRange);
                for (e = 0; e < n.length; e++)
                    this.isRTL ? n[e].col = this.daysPerRow - 1 - n[e].dayIndex : n[e].col = n[e].dayIndex;
                return n
            }
            ,
            t.prototype.sliceRangeByTimes = function(t) {
                var e, n, r = [];
                for (n = 0; n < this.daysPerRow; n++)
                    (e = t.intersect(this.dayRanges[n])) && r.push({
                        startMs: e.startMs,
                        endMs: e.endMs,
                        isStart: e.isStart,
                        isEnd: e.isEnd,
                        dayIndex: n
                    });
                return r
            }
            ,
            t.prototype.processOptions = function() {
                var t, e = this.opt("slotDuration"), n = this.opt("snapDuration");
                e = c.duration(e),
                n = n ? c.duration(n) : e,
                this.slotDuration = e,
                this.snapDuration = n,
                this.snapsPerSlot = e / n,
                t = this.opt("slotLabelFormat"),
                o.isArray(t) && (t = t[t.length - 1]),
                this.labelFormat = t || this.opt("smallTimeFormat"),
                t = this.opt("slotLabelInterval"),
                this.labelInterval = t ? c.duration(t) : this.computeLabelInterval(e)
            }
            ,
            t.prototype.computeLabelInterval = function(t) {
                var e, n, r;
                for (e = y.length - 1; 0 <= e; e--)
                    if (n = c.duration(y[e]),
                    r = p.divideDurationByDuration(n, t),
                    p.isInt(r) && 1 < r)
                        return n;
                return c.duration(t)
            }
            ,
            t.prototype.renderDates = function(t) {
                this.dateProfile = t,
                this.updateDayTable(),
                this.renderSlats(),
                this.renderColumns()
            }
            ,
            t.prototype.unrenderDates = function() {
                this.unrenderColumns()
            }
            ,
            t.prototype.renderSkeleton = function() {
                var t = this.view.calendar.theme;
                this.el.html('<div class="fc-bg"></div><div class="fc-slats"></div><hr class="fc-divider ' + t.getClass("widgetHeader") + '" style="display:none" />'),
                this.bottomRuleEl = this.el.find("hr")
            }
            ,
            t.prototype.renderSlats = function() {
                var t = this.view.calendar.theme;
                this.slatContainerEl = this.el.find("> .fc-slats").html('<table class="' + t.getClass("tableGrid") + '">' + this.renderSlatRowHtml() + "</table>"),
                this.slatEls = this.slatContainerEl.find("tr"),
                this.slatCoordCache = new u.default({
                    els: this.slatEls,
                    isVertical: !0
                })
            }
            ,
            t.prototype.renderSlatRowHtml = function() {
                for (var t, e, n, r = this.view, i = r.calendar, o = i.theme, s = this.isRTL, a = this.dateProfile, l = "", u = c.duration(+a.minTime), d = c.duration(0); u < a.maxTime; )
                    t = i.msToUtcMoment(a.renderUnzonedRange.startMs).time(u),
                    e = p.isInt(p.divideDurationByDuration(d, this.labelInterval)),
                    n = '<td class="fc-axis fc-time ' + o.getClass("widgetContent") + '" ' + r.axisStyleAttr() + ">" + (e ? "<span>" + p.htmlEscape(t.format(this.labelFormat)) + "</span>" : "") + "</td>",
                    l += '<tr data-time="' + t.format("HH:mm:ss") + '"' + (e ? "" : ' class="fc-minor"') + ">" + (s ? "" : n) + '<td class="' + o.getClass("widgetContent") + '"/>' + (s ? n : "") + "</tr>",
                    u.add(this.slotDuration),
                    d.add(this.slotDuration);
                return l
            }
            ,
            t.prototype.renderColumns = function() {
                var e = this.dateProfile
                  , t = this.view.calendar.theme;
                this.dayRanges = this.dayDates.map(function(t) {
                    return new d.default(t.clone().add(e.minTime),t.clone().add(e.maxTime))
                }),
                this.headContainerEl && this.headContainerEl.html(this.renderHeadHtml()),
                this.el.find("> .fc-bg").html('<table class="' + t.getClass("tableGrid") + '">' + this.renderBgTrHtml(0) + "</table>"),
                this.colEls = this.el.find(".fc-day, .fc-disabled-day"),
                this.colCoordCache = new u.default({
                    els: this.colEls,
                    isHorizontal: !0
                }),
                this.renderContentSkeleton()
            }
            ,
            t.prototype.unrenderColumns = function() {
                this.unrenderContentSkeleton()
            }
            ,
            t.prototype.renderContentSkeleton = function() {
                var t, e, n = "";
                for (t = 0; t < this.colCnt; t++)
                    n += '<td><div class="fc-content-col"><div class="fc-event-container fc-helper-container"></div><div class="fc-event-container"></div><div class="fc-highlight-container"></div><div class="fc-bgevent-container"></div><div class="fc-business-container"></div></div></td>';
                e = this.contentSkeletonEl = o('<div class="fc-content-skeleton"><table><tr>' + n + "</tr></table></div>"),
                this.colContainerEls = e.find(".fc-content-col"),
                this.helperContainerEls = e.find(".fc-helper-container"),
                this.fgContainerEls = e.find(".fc-event-container:not(.fc-helper-container)"),
                this.bgContainerEls = e.find(".fc-bgevent-container"),
                this.highlightContainerEls = e.find(".fc-highlight-container"),
                this.businessContainerEls = e.find(".fc-business-container"),
                this.bookendCells(e.find("tr")),
                this.el.append(e)
            }
            ,
            t.prototype.unrenderContentSkeleton = function() {
                this.contentSkeletonEl && (this.contentSkeletonEl.remove(),
                this.contentSkeletonEl = null,
                this.colContainerEls = null,
                this.helperContainerEls = null,
                this.fgContainerEls = null,
                this.bgContainerEls = null,
                this.highlightContainerEls = null,
                this.businessContainerEls = null)
            }
            ,
            t.prototype.groupSegsByCol = function(t) {
                var e, n = [];
                for (e = 0; e < this.colCnt; e++)
                    n.push([]);
                for (e = 0; e < t.length; e++)
                    n[t[e].col].push(t[e]);
                return n
            }
            ,
            t.prototype.attachSegsByCol = function(t, e) {
                var n, r, i;
                for (n = 0; n < this.colCnt; n++)
                    for (r = t[n],
                    i = 0; i < r.length; i++)
                        e.eq(n).append(r[i].el)
            }
            ,
            t.prototype.getNowIndicatorUnit = function() {
                return "minute"
            }
            ,
            t.prototype.renderNowIndicator = function(t) {
                if (this.colContainerEls) {
                    var e, n = this.componentFootprintToSegs(new h.default(new d.default(t,t.valueOf() + 1),!1)), r = this.computeDateTop(t, t), i = [];
                    for (e = 0; e < n.length; e++)
                        i.push(o('<div class="fc-now-indicator fc-now-indicator-line"></div>').css("top", r).appendTo(this.colContainerEls.eq(n[e].col))[0]);
                    0 < n.length && i.push(o('<div class="fc-now-indicator fc-now-indicator-arrow"></div>').css("top", r).appendTo(this.el.find(".fc-content-skeleton"))[0]),
                    this.nowIndicatorEls = o(i)
                }
            }
            ,
            t.prototype.unrenderNowIndicator = function() {
                this.nowIndicatorEls && (this.nowIndicatorEls.remove(),
                this.nowIndicatorEls = null)
            }
            ,
            t.prototype.updateSize = function(t, e, n) {
                r.prototype.updateSize.call(this, t, e, n),
                this.slatCoordCache.build(),
                n && this.updateSegVerticals([].concat(this.eventRenderer.getSegs(), this.businessSegs || []))
            }
            ,
            t.prototype.getTotalSlatHeight = function() {
                return this.slatContainerEl.outerHeight()
            }
            ,
            t.prototype.computeDateTop = function(t, e) {
                return this.computeTimeTop(c.duration(t - e.clone().stripTime()))
            }
            ,
            t.prototype.computeTimeTop = function(t) {
                var e, n, r = this.slatEls.length, i = (t - this.dateProfile.minTime) / this.slotDuration;
                return i = Math.max(0, i),
                i = Math.min(r, i),
                e = Math.floor(i),
                n = i - (e = Math.min(e, r - 1)),
                this.slatCoordCache.getTopPosition(e) + this.slatCoordCache.getHeight(e) * n
            }
            ,
            t.prototype.updateSegVerticals = function(t) {
                this.computeSegVerticals(t),
                this.assignSegVerticals(t)
            }
            ,
            t.prototype.computeSegVerticals = function(t) {
                var e, n, r, i = this.opt("agendaEventMinHeight");
                for (e = 0; e < t.length; e++)
                    n = t[e],
                    r = this.dayDates[n.dayIndex],
                    n.top = this.computeDateTop(n.startMs, r),
                    n.bottom = Math.max(n.top + i, this.computeDateTop(n.endMs, r))
            }
            ,
            t.prototype.assignSegVerticals = function(t) {
                var e, n;
                for (e = 0; e < t.length; e++)
                    (n = t[e]).el.css(this.generateSegVerticalCss(n))
            }
            ,
            t.prototype.generateSegVerticalCss = function(t) {
                return {
                    top: t.top,
                    bottom: -t.bottom
                }
            }
            ,
            t.prototype.prepareHits = function() {
                this.colCoordCache.build(),
                this.slatCoordCache.build()
            }
            ,
            t.prototype.releaseHits = function() {
                this.colCoordCache.clear()
            }
            ,
            t.prototype.queryHit = function(t, e) {
                var n = this.snapsPerSlot
                  , r = this.colCoordCache
                  , i = this.slatCoordCache;
                if (r.isLeftInBounds(t) && i.isTopInBounds(e)) {
                    var o = r.getHorizontalIndex(t)
                      , s = i.getVerticalIndex(e);
                    if (null != o && null != s) {
                        var a = i.getTopOffset(s)
                          , l = i.getHeight(s)
                          , u = (e - a) / l
                          , d = Math.floor(u * n)
                          , c = a + d / n * l
                          , p = a + (d + 1) / n * l;
                        return {
                            col: o,
                            snap: s * n + d,
                            component: this,
                            left: r.getLeftOffset(o),
                            right: r.getRightOffset(o),
                            top: c,
                            bottom: p
                        }
                    }
                }
            }
            ,
            t.prototype.getHitFootprint = function(t) {
                var e, n = this.getCellDate(0, t.col), r = this.computeSnapTime(t.snap);
                return n.time(r),
                e = n.clone().add(this.snapDuration),
                new h.default(new d.default(n,e),!1)
            }
            ,
            t.prototype.computeSnapTime = function(t) {
                return c.duration(this.dateProfile.minTime + this.snapDuration * t)
            }
            ,
            t.prototype.getHitEl = function(t) {
                return this.colEls.eq(t.col)
            }
            ,
            t.prototype.renderDrag = function(t, e, n) {
                var r;
                if (e) {
                    if (t.length)
                        return this.helperRenderer.renderEventDraggingFootprints(t, e, n),
                        !0
                } else
                    for (r = 0; r < t.length; r++)
                        this.renderHighlight(t[r].componentFootprint)
            }
            ,
            t.prototype.unrenderDrag = function() {
                this.unrenderHighlight(),
                this.helperRenderer.unrender()
            }
            ,
            t.prototype.renderEventResize = function(t, e, n) {
                this.helperRenderer.renderEventResizingFootprints(t, e, n)
            }
            ,
            t.prototype.unrenderEventResize = function() {
                this.helperRenderer.unrender()
            }
            ,
            t.prototype.renderSelectionFootprint = function(t) {
                this.opt("selectHelper") ? this.helperRenderer.renderComponentFootprint(t) : this.renderHighlight(t)
            }
            ,
            t.prototype.unrenderSelection = function() {
                this.helperRenderer.unrender(),
                this.unrenderHighlight()
            }
            ,
            t
        }(r.default);
        (e.default = m).prototype.eventRendererClass = f.default,
        m.prototype.businessHourRendererClass = s.default,
        m.prototype.helperRendererClass = g.default,
        m.prototype.fillRendererClass = v.default,
        a.default.mixInto(m),
        l.default.mixInto(m)
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , a = n(5)
          , i = function(s) {
            function t() {
                return null !== s && s.apply(this, arguments) || this
            }
            return r.__extends(t, s),
            t.prototype.buildRenderRange = function(t, e, n) {
                var r = s.prototype.buildRenderRange.call(this, t, e, n)
                  , i = this.msToUtcMoment(r.startMs, n)
                  , o = this.msToUtcMoment(r.endMs, n);
                return /^(year|month)$/.test(e) && (i.startOf("week"),
                o.weekday() && o.add(1, "week").startOf("week")),
                new a.default(i,o)
            }
            ,
            t
        }(n(221).default);
        e.default = i
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , i = n(0)
          , o = n(4)
          , s = n(62)
          , a = n(253)
          , l = function(t) {
            function e() {
                return null !== t && t.apply(this, arguments) || this
            }
            return r.__extends(e, t),
            e.prototype.setGridHeight = function(t, e) {
                e && (t *= this.dayGrid.rowCnt / 6),
                o.distributeHeight(this.dayGrid.rowEls, t, !e)
            }
            ,
            e.prototype.isDateInOtherMonth = function(t, e) {
                return t.month() !== i.utc(e.currentUnzonedRange.startMs).month()
            }
            ,
            e
        }(s.default);
        (e.default = l).prototype.dateProfileGeneratorClass = a.default
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var i = n(2)
          , a = n(3)
          , o = n(4)
          , s = n(5)
          , r = n(41)
          , l = n(39)
          , u = n(254)
          , d = n(255)
          , c = function(r) {
            function t(t, e) {
                var n = r.call(this, t, e) || this;
                return n.segSelector = ".fc-list-item",
                n.scroller = new l.default({
                    overflowX: "hidden",
                    overflowY: "auto"
                }),
                n
            }
            return i.__extends(t, r),
            t.prototype.renderSkeleton = function() {
                this.el.addClass("fc-list-view " + this.calendar.theme.getClass("listView")),
                this.scroller.render(),
                this.scroller.el.appendTo(this.el),
                this.contentEl = this.scroller.scrollEl
            }
            ,
            t.prototype.unrenderSkeleton = function() {
                this.scroller.destroy()
            }
            ,
            t.prototype.updateSize = function(t, e, n) {
                r.prototype.updateSize.call(this, t, e, n),
                this.scroller.clear(),
                e || this.scroller.setHeight(this.computeScrollerHeight(t))
            }
            ,
            t.prototype.computeScrollerHeight = function(t) {
                return t - o.subtractInnerElHeight(this.el, this.scroller.el)
            }
            ,
            t.prototype.renderDates = function(t) {
                for (var e = this.calendar, n = e.msToUtcMoment(t.renderUnzonedRange.startMs, !0), r = e.msToUtcMoment(t.renderUnzonedRange.endMs, !0), i = [], o = []; n < r; )
                    i.push(n.clone()),
                    o.push(new s.default(n,n.clone().add(1, "day"))),
                    n.add(1, "day");
                this.dayDates = i,
                this.dayRanges = o
            }
            ,
            t.prototype.componentFootprintToSegs = function(t) {
                var e, n, r, i = this.dayRanges, o = [];
                for (e = 0; e < i.length; e++)
                    if ((n = t.unzonedRange.intersect(i[e])) && (r = {
                        startMs: n.startMs,
                        endMs: n.endMs,
                        isStart: n.isStart,
                        isEnd: n.isEnd,
                        dayIndex: e
                    },
                    o.push(r),
                    !r.isEnd && !t.isAllDay && e + 1 < i.length && t.unzonedRange.endMs < i[e + 1].startMs + this.nextDayThreshold)) {
                        r.endMs = t.unzonedRange.endMs,
                        r.isEnd = !0;
                        break
                    }
                return o
            }
            ,
            t.prototype.renderEmptyMessage = function() {
                this.contentEl.html('<div class="fc-list-empty-wrap2"><div class="fc-list-empty-wrap1"><div class="fc-list-empty">' + o.htmlEscape(this.opt("noEventsMessage")) + "</div></div></div>")
            }
            ,
            t.prototype.renderSegList = function(t) {
                var e, n, r, i = this.groupSegsByDay(t), o = a('<table class="fc-list-table ' + this.calendar.theme.getClass("tableList") + '"><tbody/></table>'), s = o.find("tbody");
                for (e = 0; e < i.length; e++)
                    if (n = i[e])
                        for (s.append(this.dayHeaderHtml(this.dayDates[e])),
                        this.eventRenderer.sortEventSegs(n),
                        r = 0; r < n.length; r++)
                            s.append(n[r].el);
                this.contentEl.empty().append(o)
            }
            ,
            t.prototype.groupSegsByDay = function(t) {
                var e, n, r = [];
                for (e = 0; e < t.length; e++)
                    (r[(n = t[e]).dayIndex] || (r[n.dayIndex] = [])).push(n);
                return r
            }
            ,
            t.prototype.dayHeaderHtml = function(t) {
                var e = this.opt("listDayFormat")
                  , n = this.opt("listDayAltFormat");
                return '<tr class="fc-list-heading" data-date="' + t.format("YYYY-MM-DD") + '"><td class="' + (this.calendar.theme.getClass("tableListHeading") || this.calendar.theme.getClass("widgetHeader")) + '" colspan="3">' + (e ? this.buildGotoAnchorHtml(t, {
                    class: "fc-list-heading-main"
                }, o.htmlEscape(t.format(e))) : "") + (n ? this.buildGotoAnchorHtml(t, {
                    class: "fc-list-heading-alt"
                }, o.htmlEscape(t.format(n))) : "") + "</td></tr>"
            }
            ,
            t
        }(r.default);
        (e.default = c).prototype.eventRendererClass = u.default,
        c.prototype.eventPointingClass = d.default
    }
    , , , , , , function(t, e, n) {
        var l = n(3)
          , r = n(16)
          , u = n(4)
          , d = n(220);
        n(10),
        n(47),
        n(256),
        n(257),
        n(260),
        n(261),
        n(262),
        n(263),
        l.fullCalendar = r,
        l.fn.fullCalendar = function(o) {
            var s = Array.prototype.slice.call(arguments, 1)
              , a = this;
            return this.each(function(t, e) {
                var n, r = l(e), i = r.data("fullCalendar");
                "string" == typeof o ? "getCalendar" === o ? t || (a = i) : "destroy" === o ? i && (i.destroy(),
                r.removeData("fullCalendar")) : i ? l.isFunction(i[o]) ? (n = i[o].apply(i, s),
                t || (a = n),
                "destroy" === o && r.removeData("fullCalendar")) : u.warn("'" + o + "' is an unknown FullCalendar method.") : u.warn("Attempting to call a FullCalendar method on an element with no calendar.") : i || (i = new d.default(r,o),
                r.data("fullCalendar", i),
                i.render())
            }),
            a
        }
        ,
        t.exports = r
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , i = function(t) {
            function e() {
                return null !== t && t.apply(this, arguments) || this
            }
            return r.__extends(e, t),
            e.prototype.setElement = function(t) {
                this.el = t,
                this.bindGlobalHandlers(),
                this.renderSkeleton(),
                this.set("isInDom", !0)
            }
            ,
            e.prototype.removeElement = function() {
                this.unset("isInDom"),
                this.unrenderSkeleton(),
                this.unbindGlobalHandlers(),
                this.el.remove()
            }
            ,
            e.prototype.bindGlobalHandlers = function() {}
            ,
            e.prototype.unbindGlobalHandlers = function() {}
            ,
            e.prototype.renderSkeleton = function() {}
            ,
            e.prototype.unrenderSkeleton = function() {}
            ,
            e
        }(n(48).default);
        e.default = i
    }
    , function(t, e) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var n = function() {
            function t(t) {
                this.items = t || []
            }
            return t.prototype.proxyCall = function(e) {
                for (var n = [], t = 1; t < arguments.length; t++)
                    n[t - 1] = arguments[t];
                var r = [];
                return this.items.forEach(function(t) {
                    r.push(t[e].apply(t, n))
                }),
                r
            }
            ,
            t
        }();
        e.default = n
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var w = n(3)
          , D = n(4)
          , r = function() {
            function t(t, e) {
                this.el = null,
                this.viewsWithButtons = [],
                this.calendar = t,
                this.toolbarOptions = e
            }
            return t.prototype.setToolbarOptions = function(t) {
                this.toolbarOptions = t
            }
            ,
            t.prototype.render = function() {
                var t = this.toolbarOptions.layout
                  , e = this.el;
                t ? (e ? e.empty() : e = this.el = w("<div class='fc-toolbar " + this.toolbarOptions.extraClasses + "'/>"),
                e.append(this.renderSection("left")).append(this.renderSection("right")).append(this.renderSection("center")).append('<div class="fc-clear"/>')) : this.removeElement()
            }
            ,
            t.prototype.removeElement = function() {
                this.el && (this.el.remove(),
                this.el = null)
            }
            ,
            t.prototype.renderSection = function(t) {
                var h = this
                  , f = this.calendar
                  , g = f.theme
                  , e = f.optionsManager
                  , v = f.viewSpecManager
                  , r = w('<div class="fc-' + t + '"/>')
                  , n = this.toolbarOptions.layout[t]
                  , y = e.get("customButtons") || {}
                  , m = e.overrides.buttonText || {}
                  , b = e.get("buttonText") || {};
                return n && w.each(n.split(" "), function(t, e) {
                    var n, c = w(), p = !0;
                    w.each(e.split(","), function(t, e) {
                        var n, r, i, o, s, a, l, u, d;
                        "title" === e ? (c = c.add(w("<h2>&nbsp;</h2>")),
                        p = !1) : ((n = y[e]) ? (i = function(t) {
                            n.click && n.click.call(u[0], t)
                        }
                        ,
                        (o = g.getCustomButtonIconClass(n)) || (o = g.getIconClass(e)) || (s = n.text)) : (r = v.getViewSpec(e)) ? (h.viewsWithButtons.push(e),
                        i = function() {
                            f.changeView(e)
                        }
                        ,
                        (s = r.buttonTextOverride) || (o = g.getIconClass(e)) || (s = r.buttonTextDefault)) : f[e] && (i = function() {
                            f[e]()
                        }
                        ,
                        (s = m[e]) || (o = g.getIconClass(e)) || (s = b[e])),
                        i && (l = ["fc-" + e + "-button", g.getClass("button"), g.getClass("stateDefault")],
                        s ? (a = D.htmlEscape(s),
                        d = "") : o && (a = "<span class='" + o + "'></span>",
                        d = ' aria-label="' + e + '"'),
                        u = w('<button type="button" class="' + l.join(" ") + '"' + d + ">" + a + "</button>").click(function(t) {
                            u.hasClass(g.getClass("stateDisabled")) || (i(t),
                            (u.hasClass(g.getClass("stateActive")) || u.hasClass(g.getClass("stateDisabled"))) && u.removeClass(g.getClass("stateHover")))
                        }).mousedown(function() {
                            u.not("." + g.getClass("stateActive")).not("." + g.getClass("stateDisabled")).addClass(g.getClass("stateDown"))
                        }).mouseup(function() {
                            u.removeClass(g.getClass("stateDown"))
                        }).hover(function() {
                            u.not("." + g.getClass("stateActive")).not("." + g.getClass("stateDisabled")).addClass(g.getClass("stateHover"))
                        }, function() {
                            u.removeClass(g.getClass("stateHover")).removeClass(g.getClass("stateDown"))
                        }),
                        c = c.add(u)))
                    }),
                    p && c.first().addClass(g.getClass("cornerLeft")).end().last().addClass(g.getClass("cornerRight")).end(),
                    1 < c.length ? (n = w("<div/>"),
                    p && n.addClass(g.getClass("buttonGroup")),
                    n.append(c),
                    r.append(n)) : r.append(c)
                }),
                r
            }
            ,
            t.prototype.updateTitle = function(t) {
                this.el && this.el.find("h2").text(t)
            }
            ,
            t.prototype.activateButton = function(t) {
                this.el && this.el.find(".fc-" + t + "-button").addClass(this.calendar.theme.getClass("stateActive"))
            }
            ,
            t.prototype.deactivateButton = function(t) {
                this.el && this.el.find(".fc-" + t + "-button").removeClass(this.calendar.theme.getClass("stateActive"))
            }
            ,
            t.prototype.disableButton = function(t) {
                this.el && this.el.find(".fc-" + t + "-button").prop("disabled", !0).addClass(this.calendar.theme.getClass("stateDisabled"))
            }
            ,
            t.prototype.enableButton = function(t) {
                this.el && this.el.find(".fc-" + t + "-button").prop("disabled", !1).removeClass(this.calendar.theme.getClass("stateDisabled"))
            }
            ,
            t.prototype.getViewsWithButtons = function() {
                return this.viewsWithButtons
            }
            ,
            t
        }();
        e.default = r
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var i = n(2)
          , o = n(3)
          , s = n(4)
          , a = n(32)
          , l = n(31)
          , r = function(r) {
            function t(t, e) {
                var n = r.call(this) || this;
                return n._calendar = t,
                n.overrides = o.extend({}, e),
                n.dynamicOverrides = {},
                n.compute(),
                n
            }
            return i.__extends(t, r),
            t.prototype.add = function(t) {
                var e, n = 0;
                for (e in this.recordOverrides(t),
                t)
                    n++;
                if (1 === n) {
                    if ("height" === e || "contentHeight" === e || "aspectRatio" === e)
                        return void this._calendar.updateViewSize(!0);
                    if ("defaultDate" === e)
                        return;
                    if ("businessHours" === e)
                        return;
                    if (/^(event|select)(Overlap|Constraint|Allow)$/.test(e))
                        return;
                    if ("timezone" === e)
                        return void this._calendar.view.flash("initialEvents")
                }
                this._calendar.renderHeader(),
                this._calendar.renderFooter(),
                this._calendar.viewsByType = {},
                this._calendar.reinitView()
            }
            ,
            t.prototype.compute = function() {
                var t, e, n, r;
                t = s.firstDefined(this.dynamicOverrides.locale, this.overrides.locale),
                (e = l.localeOptionHash[t]) || (t = a.globalDefaults.locale,
                e = l.localeOptionHash[t] || {}),
                n = s.firstDefined(this.dynamicOverrides.isRTL, this.overrides.isRTL, e.isRTL, a.globalDefaults.isRTL) ? a.rtlDefaults : {},
                this.dirDefaults = n,
                this.localeDefaults = e,
                r = a.mergeOptions([a.globalDefaults, n, e, this.overrides, this.dynamicOverrides]),
                l.populateInstanceComputableOptions(r),
                this.reset(r)
            }
            ,
            t.prototype.recordOverrides = function(t) {
                var e;
                for (e in t)
                    this.dynamicOverrides[e] = t[e];
                this._calendar.viewSpecManager.clearCache(),
                this.compute()
            }
            ,
            t
        }(n(48).default);
        e.default = r
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var c = n(0)
          , i = n(3)
          , p = n(22)
          , h = n(4)
          , f = n(32)
          , r = n(31)
          , o = function() {
            function t(t, e) {
                this.optionsManager = t,
                this._calendar = e,
                this.clearCache()
            }
            return t.prototype.clearCache = function() {
                this.viewSpecCache = {}
            }
            ,
            t.prototype.getViewSpec = function(t) {
                var e = this.viewSpecCache;
                return e[t] || (e[t] = this.buildViewSpec(t))
            }
            ,
            t.prototype.getUnitViewSpec = function(t) {
                var e, n, r;
                if (-1 !== i.inArray(t, h.unitsDesc))
                    for (e = this._calendar.header.getViewsWithButtons(),
                    i.each(p.viewHash, function(t) {
                        e.push(t)
                    }),
                    n = 0; n < e.length; n++)
                        if ((r = this.getViewSpec(e[n])) && r.singleUnit === t)
                            return r
            }
            ,
            t.prototype.buildViewSpec = function(t) {
                for (var e, n, r, i, o, s = this.optionsManager.overrides.views || {}, a = [], l = [], u = [], d = t; d; )
                    e = p.viewHash[d],
                    n = s[d],
                    d = null,
                    "function" == typeof e && (e = {
                        class: e
                    }),
                    e && (a.unshift(e),
                    l.unshift(e.defaults || {}),
                    r = r || e.duration,
                    d = d || e.type),
                    n && (u.unshift(n),
                    r = r || n.duration,
                    d = d || n.type);
                return (e = h.mergeProps(a)).type = t,
                !!e.class && ((r = r || this.optionsManager.dynamicOverrides.duration || this.optionsManager.overrides.duration) && (i = c.duration(r)).valueOf() && (o = h.computeDurationGreatestUnit(i, r),
                e.duration = i,
                e.durationUnit = o,
                1 === i.as(o) && (e.singleUnit = o,
                u.unshift(s[o] || {}))),
                e.defaults = f.mergeOptions(l),
                e.overrides = f.mergeOptions(u),
                this.buildViewSpecOptions(e),
                this.buildViewSpecButtonText(e, t),
                e)
            }
            ,
            t.prototype.buildViewSpecOptions = function(t) {
                var e = this.optionsManager;
                t.options = f.mergeOptions([f.globalDefaults, t.defaults, e.dirDefaults, e.localeDefaults, e.overrides, t.overrides, e.dynamicOverrides]),
                r.populateInstanceComputableOptions(t.options)
            }
            ,
            t.prototype.buildViewSpecButtonText = function(n, r) {
                var t = this.optionsManager;
                function e(t) {
                    var e = t.buttonText || {};
                    return e[r] || (n.buttonTextKey ? e[n.buttonTextKey] : null) || (n.singleUnit ? e[n.singleUnit] : null)
                }
                n.buttonTextOverride = e(t.dynamicOverrides) || e(t.overrides) || n.overrides.buttonText,
                n.buttonTextDefault = e(t.localeDefaults) || e(t.dirDefaults) || n.defaults.buttonText || e(f.globalDefaults) || (n.duration ? this._calendar.humanizeDuration(n.duration) : null) || r
            }
            ,
            t
        }();
        e.default = o
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var i = n(3)
          , r = n(4)
          , o = n(243)
          , s = n(52)
          , a = n(6)
          , l = n(38)
          , u = n(13)
          , d = n(18)
          , c = n(11)
          , p = n(7)
          , h = function() {
            function t(t) {
                this.calendar = t,
                this.stickySource = new s.default(t),
                this.otherSources = []
            }
            return t.prototype.requestEvents = function(t, e, n, r) {
                return !r && this.currentPeriod && this.currentPeriod.isWithinRange(t, e) && n === this.currentPeriod.timezone || this.setPeriod(new o.default(t,e,n)),
                this.currentPeriod.whenReleased()
            }
            ,
            t.prototype.addSource = function(t) {
                this.otherSources.push(t),
                this.currentPeriod && this.currentPeriod.requestSource(t)
            }
            ,
            t.prototype.removeSource = function(t) {
                r.removeExact(this.otherSources, t),
                this.currentPeriod && this.currentPeriod.purgeSource(t)
            }
            ,
            t.prototype.removeAllSources = function() {
                this.otherSources = [],
                this.currentPeriod && this.currentPeriod.purgeAllSources()
            }
            ,
            t.prototype.refetchSource = function(t) {
                var e = this.currentPeriod;
                e && (e.freeze(),
                e.purgeSource(t),
                e.requestSource(t),
                e.thaw())
            }
            ,
            t.prototype.refetchAllSources = function() {
                var t = this.currentPeriod;
                t && (t.freeze(),
                t.purgeAllSources(),
                t.requestSources(this.getSources()),
                t.thaw())
            }
            ,
            t.prototype.getSources = function() {
                return [this.stickySource].concat(this.otherSources)
            }
            ,
            t.prototype.multiQuerySources = function(t) {
                t ? i.isArray(t) || (t = [t]) : t = [];
                var e, n = [];
                for (e = 0; e < t.length; e++)
                    n.push.apply(n, this.querySources(t[e]));
                return n
            }
            ,
            t.prototype.querySources = function(n) {
                var t, e, r = this.otherSources;
                for (t = 0; t < r.length; t++)
                    if ((e = r[t]) === n)
                        return [e];
                return (e = this.getSourceById(a.default.normalizeId(n))) ? [e] : (n = l.default.parse(n, this.calendar)) ? i.grep(r, function(t) {
                    return e = t,
                    n.getPrimitive() === e.getPrimitive();
                    var e
                }) : void 0
            }
            ,
            t.prototype.getSourceById = function(e) {
                return i.grep(this.otherSources, function(t) {
                    return t.id && t.id === e
                })[0]
            }
            ,
            t.prototype.setPeriod = function(t) {
                this.currentPeriod && (this.unbindPeriod(this.currentPeriod),
                this.currentPeriod = null),
                this.currentPeriod = t,
                this.bindPeriod(t),
                t.requestSources(this.getSources())
            }
            ,
            t.prototype.bindPeriod = function(t) {
                this.listenTo(t, "release", function(t) {
                    this.trigger("release", t)
                })
            }
            ,
            t.prototype.unbindPeriod = function(t) {
                this.stopListeningTo(t)
            }
            ,
            t.prototype.getEventDefByUid = function(t) {
                if (this.currentPeriod)
                    return this.currentPeriod.getEventDefByUid(t)
            }
            ,
            t.prototype.addEventDef = function(t, e) {
                e && this.stickySource.addEventDef(t),
                this.currentPeriod && this.currentPeriod.addEventDef(t)
            }
            ,
            t.prototype.removeEventDefsById = function(e) {
                this.getSources().forEach(function(t) {
                    t.removeEventDefsById(e)
                }),
                this.currentPeriod && this.currentPeriod.removeEventDefsById(e)
            }
            ,
            t.prototype.removeAllEventDefs = function() {
                this.getSources().forEach(function(t) {
                    t.removeAllEventDefs()
                }),
                this.currentPeriod && this.currentPeriod.removeAllEventDefs()
            }
            ,
            t.prototype.mutateEventsWithId = function(t, e) {
                var n, r = this.currentPeriod, i = [];
                return r ? (r.freeze(),
                (n = r.getEventDefsById(t)).forEach(function(t) {
                    r.removeEventDef(t),
                    i.push(e.mutateSingle(t)),
                    r.addEventDef(t)
                }),
                r.thaw(),
                function() {
                    r.freeze();
                    for (var t = 0; t < n.length; t++)
                        r.removeEventDef(n[t]),
                        i[t](),
                        r.addEventDef(n[t]);
                    r.thaw()
                }
                ) : function() {}
            }
            ,
            t.prototype.buildMutatedEventInstanceGroup = function(t, e) {
                var n, r, i = this.getEventDefsById(t), o = [];
                for (n = 0; n < i.length; n++)
                    (r = i[n].clone())instanceof u.default && (e.mutateSingle(r),
                    o.push.apply(o, r.buildInstances()));
                return new d.default(o)
            }
            ,
            t.prototype.freeze = function() {
                this.currentPeriod && this.currentPeriod.freeze()
            }
            ,
            t.prototype.thaw = function() {
                this.currentPeriod && this.currentPeriod.thaw()
            }
            ,
            t.prototype.getEventDefsById = function(t) {
                return this.currentPeriod.getEventDefsById(t)
            }
            ,
            t.prototype.getEventInstances = function() {
                return this.currentPeriod.getEventInstances()
            }
            ,
            t.prototype.getEventInstancesWithId = function(t) {
                return this.currentPeriod.getEventInstancesWithId(t)
            }
            ,
            t.prototype.getEventInstancesWithoutId = function(t) {
                return this.currentPeriod.getEventInstancesWithoutId(t)
            }
            ,
            t
        }();
        e.default = h,
        c.default.mixInto(h),
        p.default.mixInto(h)
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(3)
          , i = n(4)
          , o = n(20)
          , s = n(11)
          , a = n(5)
          , l = n(18)
          , u = function() {
            function t(t, e, n) {
                this.pendingCnt = 0,
                this.freezeDepth = 0,
                this.stuntedReleaseCnt = 0,
                this.releaseCnt = 0,
                this.start = t,
                this.end = e,
                this.timezone = n,
                this.unzonedRange = new a.default(t.clone().stripZone(),e.clone().stripZone()),
                this.requestsByUid = {},
                this.eventDefsByUid = {},
                this.eventDefsById = {},
                this.eventInstanceGroupsById = {}
            }
            return t.prototype.isWithinRange = function(t, e) {
                return !t.isBefore(this.start) && !e.isAfter(this.end)
            }
            ,
            t.prototype.requestSources = function(t) {
                this.freeze();
                for (var e = 0; e < t.length; e++)
                    this.requestSource(t[e]);
                this.thaw()
            }
            ,
            t.prototype.requestSource = function(t) {
                var e = this
                  , n = {
                    source: t,
                    status: "pending",
                    eventDefs: null
                };
                this.requestsByUid[t.uid] = n,
                this.pendingCnt += 1,
                t.fetch(this.start, this.end, this.timezone).then(function(t) {
                    "cancelled" !== n.status && (n.status = "completed",
                    n.eventDefs = t,
                    e.addEventDefs(t),
                    e.pendingCnt--,
                    e.tryRelease())
                }, function() {
                    "cancelled" !== n.status && (n.status = "failed",
                    e.pendingCnt--,
                    e.tryRelease())
                })
            }
            ,
            t.prototype.purgeSource = function(t) {
                var e = this.requestsByUid[t.uid];
                e && (delete this.requestsByUid[t.uid],
                "pending" === e.status ? (e.status = "cancelled",
                this.pendingCnt--,
                this.tryRelease()) : "completed" === e.status && e.eventDefs.forEach(this.removeEventDef.bind(this)))
            }
            ,
            t.prototype.purgeAllSources = function() {
                var t, e, n = this.requestsByUid, r = 0;
                for (t in n)
                    "pending" === (e = n[t]).status ? e.status = "cancelled" : "completed" === e.status && r++;
                this.requestsByUid = {},
                this.pendingCnt = 0,
                r && this.removeAllEventDefs()
            }
            ,
            t.prototype.getEventDefByUid = function(t) {
                return this.eventDefsByUid[t]
            }
            ,
            t.prototype.getEventDefsById = function(t) {
                var e = this.eventDefsById[t];
                return e ? e.slice() : []
            }
            ,
            t.prototype.addEventDefs = function(t) {
                for (var e = 0; e < t.length; e++)
                    this.addEventDef(t[e])
            }
            ,
            t.prototype.addEventDef = function(t) {
                var e, n = this.eventDefsById, r = t.id, i = n[r] || (n[r] = []), o = t.buildInstances(this.unzonedRange);
                for (i.push(t),
                this.eventDefsByUid[t.uid] = t,
                e = 0; e < o.length; e++)
                    this.addEventInstance(o[e], r)
            }
            ,
            t.prototype.removeEventDefsById = function(t) {
                var e = this;
                this.getEventDefsById(t).forEach(function(t) {
                    e.removeEventDef(t)
                })
            }
            ,
            t.prototype.removeAllEventDefs = function() {
                var t = r.isEmptyObject(this.eventDefsByUid);
                this.eventDefsByUid = {},
                this.eventDefsById = {},
                this.eventInstanceGroupsById = {},
                t || this.tryRelease()
            }
            ,
            t.prototype.removeEventDef = function(t) {
                var e = this.eventDefsById
                  , n = e[t.id];
                delete this.eventDefsByUid[t.uid],
                n && (i.removeExact(n, t),
                n.length || delete e[t.id],
                this.removeEventInstancesForDef(t))
            }
            ,
            t.prototype.getEventInstances = function() {
                var t, e = this.eventInstanceGroupsById, n = [];
                for (t in e)
                    n.push.apply(n, e[t].eventInstances);
                return n
            }
            ,
            t.prototype.getEventInstancesWithId = function(t) {
                var e = this.eventInstanceGroupsById[t];
                return e ? e.eventInstances.slice() : []
            }
            ,
            t.prototype.getEventInstancesWithoutId = function(t) {
                var e, n = this.eventInstanceGroupsById, r = [];
                for (e in n)
                    e !== t && r.push.apply(r, n[e].eventInstances);
                return r
            }
            ,
            t.prototype.addEventInstance = function(t, e) {
                var n = this.eventInstanceGroupsById;
                (n[e] || (n[e] = new l.default)).eventInstances.push(t),
                this.tryRelease()
            }
            ,
            t.prototype.removeEventInstancesForDef = function(e) {
                var t, n = this.eventInstanceGroupsById, r = n[e.id];
                r && (t = i.removeMatching(r.eventInstances, function(t) {
                    return t.def === e
                }),
                r.eventInstances.length || delete n[e.id],
                t && this.tryRelease())
            }
            ,
            t.prototype.tryRelease = function() {
                this.pendingCnt || (this.freezeDepth ? this.stuntedReleaseCnt++ : this.release())
            }
            ,
            t.prototype.release = function() {
                this.releaseCnt++,
                this.trigger("release", this.eventInstanceGroupsById)
            }
            ,
            t.prototype.whenReleased = function() {
                var e = this;
                return this.releaseCnt ? o.default.resolve(this.eventInstanceGroupsById) : o.default.construct(function(t) {
                    e.one("release", t)
                })
            }
            ,
            t.prototype.freeze = function() {
                this.freezeDepth++ || (this.stuntedReleaseCnt = 0)
            }
            ,
            t.prototype.thaw = function() {
                --this.freezeDepth || !this.stuntedReleaseCnt || this.pendingCnt || this.release()
            }
            ,
            t
        }();
        e.default = u,
        s.default.mixInto(u)
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var o = n(3)
          , r = n(4)
          , i = n(7)
          , s = function() {
            function t(t, e) {
                this.isFollowing = !1,
                this.isHidden = !1,
                this.isAnimating = !1,
                this.options = e = e || {},
                this.sourceEl = t,
                this.parentEl = e.parentEl ? o(e.parentEl) : t.parent()
            }
            return t.prototype.start = function(t) {
                this.isFollowing || (this.isFollowing = !0,
                this.y0 = r.getEvY(t),
                this.x0 = r.getEvX(t),
                this.topDelta = 0,
                this.leftDelta = 0,
                this.isHidden || this.updatePosition(),
                r.getEvIsTouch(t) ? this.listenTo(o(document), "touchmove", this.handleMove) : this.listenTo(o(document), "mousemove", this.handleMove))
            }
            ,
            t.prototype.stop = function(t, e) {
                var n = this
                  , r = this.options.revertDuration
                  , i = function() {
                    n.isAnimating = !1,
                    n.removeElement(),
                    n.top0 = n.left0 = null,
                    e && e()
                };
                this.isFollowing && !this.isAnimating && (this.isFollowing = !1,
                this.stopListeningTo(o(document)),
                t && r && !this.isHidden ? (this.isAnimating = !0,
                this.el.animate({
                    top: this.top0,
                    left: this.left0
                }, {
                    duration: r,
                    complete: i
                })) : i())
            }
            ,
            t.prototype.getEl = function() {
                var t = this.el;
                return t || ((t = this.el = this.sourceEl.clone().addClass(this.options.additionalClass || "").css({
                    position: "absolute",
                    visibility: "",
                    display: this.isHidden ? "none" : "",
                    margin: 0,
                    right: "auto",
                    bottom: "auto",
                    width: this.sourceEl.width(),
                    height: this.sourceEl.height(),
                    opacity: this.options.opacity || "",
                    zIndex: this.options.zIndex
                })).addClass("fc-unselectable"),
                t.appendTo(this.parentEl)),
                t
            }
            ,
            t.prototype.removeElement = function() {
                this.el && (this.el.remove(),
                this.el = null)
            }
            ,
            t.prototype.updatePosition = function() {
                var t, e;
                this.getEl(),
                null == this.top0 && (t = this.sourceEl.offset(),
                e = this.el.offsetParent().offset(),
                this.top0 = t.top - e.top,
                this.left0 = t.left - e.left),
                this.el.css({
                    top: this.top0 + this.topDelta,
                    left: this.left0 + this.leftDelta
                })
            }
            ,
            t.prototype.handleMove = function(t) {
                this.topDelta = r.getEvY(t) - this.y0,
                this.leftDelta = r.getEvX(t) - this.x0,
                this.isHidden || this.updatePosition()
            }
            ,
            t.prototype.hide = function() {
                this.isHidden || (this.isHidden = !0,
                this.el && this.el.hide())
            }
            ,
            t.prototype.show = function() {
                this.isHidden && (this.isHidden = !1,
                this.updatePosition(),
                this.getEl().show())
            }
            ,
            t
        }();
        e.default = s,
        i.default.mixInto(s)
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , s = n(23)
          , i = function(n) {
            function t(t) {
                var e = n.call(this, t) || this;
                return e.dragListener = e.buildDragListener(),
                e
            }
            return r.__extends(t, n),
            t.prototype.end = function() {
                this.dragListener.endInteraction()
            }
            ,
            t.prototype.bindToEl = function(t) {
                var e = this.component
                  , n = this.dragListener;
                e.bindDateHandlerToEl(t, "mousedown", function(t) {
                    e.shouldIgnoreMouse() || n.startInteraction(t)
                }),
                e.bindDateHandlerToEl(t, "touchstart", function(t) {
                    e.shouldIgnoreTouch() || n.startInteraction(t)
                })
            }
            ,
            t.prototype.buildDragListener = function() {
                var r, i = this, o = this.component, t = new s.default(o,{
                    scroll: this.opt("dragScroll"),
                    interactionStart: function() {
                        r = t.origHit
                    },
                    hitOver: function(t, e, n) {
                        e || (r = null)
                    },
                    hitOut: function() {
                        r = null
                    },
                    interactionEnd: function(t, e) {
                        var n;
                        !e && r && (n = o.getSafeHitFootprint(r)) && i.view.triggerDayClick(n, o.getHitEl(r), t)
                    }
                });
                return t.shouldCancelTouchScroll = !1,
                t.scrollAlwaysKills = !0,
                t
            }
            ,
            t
        }(n(15).default);
        e.default = i
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var i = n(2)
          , y = n(4)
          , r = function(r) {
            function t(t, e) {
                var n = r.call(this, t, e) || this;
                return n.timeGrid = t,
                n
            }
            return i.__extends(t, r),
            t.prototype.renderFgSegs = function(t) {
                this.renderFgSegsIntoContainers(t, this.timeGrid.fgContainerEls)
            }
            ,
            t.prototype.renderFgSegsIntoContainers = function(t, e) {
                var n, r;
                for (n = this.timeGrid.groupSegsByCol(t),
                r = 0; r < this.timeGrid.colCnt; r++)
                    this.updateFgSegCoords(n[r]);
                this.timeGrid.attachSegsByCol(n, e)
            }
            ,
            t.prototype.unrenderFgSegs = function() {
                this.fgSegs && this.fgSegs.forEach(function(t) {
                    t.el.remove()
                })
            }
            ,
            t.prototype.computeEventTimeFormat = function() {
                return this.opt("noMeridiemTimeFormat")
            }
            ,
            t.prototype.computeDisplayEventEnd = function() {
                return !0
            }
            ,
            t.prototype.fgSegHtml = function(t, e) {
                var n, r, i, o = this.view, s = o.calendar, a = t.footprint.componentFootprint, l = a.isAllDay, u = t.footprint.eventDef, d = o.isEventDefDraggable(u), c = !e && t.isStart && o.isEventDefResizableFromStart(u), p = !e && t.isEnd && o.isEventDefResizableFromEnd(u), h = this.getSegClasses(t, d, c || p), f = y.cssToStr(this.getSkinCss(u));
                if (h.unshift("fc-time-grid-event", "fc-v-event"),
                o.isMultiDayRange(a.unzonedRange)) {
                    if (t.isStart || t.isEnd) {
                        var g = s.msToMoment(t.startMs)
                          , v = s.msToMoment(t.endMs);
                        n = this._getTimeText(g, v, l),
                        r = this._getTimeText(g, v, l, "LT"),
                        i = this._getTimeText(g, v, l, null, !1)
                    }
                } else
                    n = this.getTimeText(t.footprint),
                    r = this.getTimeText(t.footprint, "LT"),
                    i = this.getTimeText(t.footprint, null, !1);
                return '<a class="' + h.join(" ") + '"' + (u.url ? ' href="' + y.htmlEscape(u.url) + '"' : "") + (f ? ' style="' + f + '"' : "") + '><div class="fc-content">' + (n ? '<div class="fc-time" data-start="' + y.htmlEscape(i) + '" data-full="' + y.htmlEscape(r) + '"><span>' + y.htmlEscape(n) + "</span></div>" : "") + (u.title ? '<div class="fc-title">' + y.htmlEscape(u.title) + "</div>" : "") + '</div><div class="fc-bg"/>' + (p ? '<div class="fc-resizer fc-end-resizer" />' : "") + "</a>"
            }
            ,
            t.prototype.updateFgSegCoords = function(t) {
                this.timeGrid.computeSegVerticals(t),
                this.computeFgSegHorizontals(t),
                this.timeGrid.assignSegVerticals(t),
                this.assignFgSegHorizontals(t)
            }
            ,
            t.prototype.computeFgSegHorizontals = function(t) {
                var e, n, r;
                if (this.sortEventSegs(t),
                function(t) {
                    var e, n, r, i, o;
                    for (e = 0; e < t.length; e++)
                        for (n = t[e],
                        r = 0; r < n.length; r++)
                            for ((i = n[r]).forwardSegs = [],
                            o = e + 1; o < t.length; o++)
                                s(i, t[o], i.forwardSegs)
                }(e = function(t) {
                    var e, n, r, i = [];
                    for (e = 0; e < t.length; e++) {
                        for (n = t[e],
                        r = 0; r < i.length && s(n, i[r]).length; r++)
                            ;
                        n.level = r,
                        (i[r] || (i[r] = [])).push(n)
                    }
                    return i
                }(t)),
                n = e[0]) {
                    for (r = 0; r < n.length; r++)
                        o(n[r]);
                    for (r = 0; r < n.length; r++)
                        this.computeFgSegForwardBack(n[r], 0, 0)
                }
            }
            ,
            t.prototype.computeFgSegForwardBack = function(t, e, n) {
                var r, i = t.forwardSegs;
                if (void 0 === t.forwardCoord)
                    for (i.length ? (this.sortForwardSegs(i),
                    this.computeFgSegForwardBack(i[0], e + 1, n),
                    t.forwardCoord = i[0].backwardCoord) : t.forwardCoord = 1,
                    t.backwardCoord = t.forwardCoord - (t.forwardCoord - n) / (e + 1),
                    r = 0; r < i.length; r++)
                        this.computeFgSegForwardBack(i[r], 0, t.forwardCoord)
            }
            ,
            t.prototype.sortForwardSegs = function(t) {
                t.sort(y.proxy(this, "compareForwardSegs"))
            }
            ,
            t.prototype.compareForwardSegs = function(t, e) {
                return e.forwardPressure - t.forwardPressure || (t.backwardCoord || 0) - (e.backwardCoord || 0) || this.compareEventSegs(t, e)
            }
            ,
            t.prototype.assignFgSegHorizontals = function(t) {
                var e, n;
                for (e = 0; e < t.length; e++)
                    (n = t[e]).el.css(this.generateFgSegHorizontalCss(n)),
                    n.bottom - n.top < 30 && n.el.addClass("fc-short")
            }
            ,
            t.prototype.generateFgSegHorizontalCss = function(t) {
                var e, n, r = this.opt("slotEventOverlap"), i = t.backwardCoord, o = t.forwardCoord, s = this.timeGrid.generateSegVerticalCss(t), a = this.timeGrid.isRTL;
                return r && (o = Math.min(1, i + 2 * (o - i))),
                a ? (e = 1 - o,
                n = i) : (e = i,
                n = 1 - o),
                s.zIndex = t.level + 1,
                s.left = 100 * e + "%",
                s.right = 100 * n + "%",
                r && t.forwardPressure && (s[a ? "marginLeft" : "marginRight"] = 20),
                s
            }
            ,
            t
        }(n(42).default);
        function o(t) {
            var e, n, r = t.forwardSegs, i = 0;
            if (void 0 === t.forwardPressure) {
                for (e = 0; e < r.length; e++)
                    o(n = r[e]),
                    i = Math.max(i, 1 + n.forwardPressure);
                t.forwardPressure = i
            }
        }
        function s(t, e, n) {
            void 0 === n && (n = []);
            for (var r = 0; r < e.length; r++)
                i = t,
                o = e[r],
                i.bottom > o.top && i.top < o.bottom && n.push(e[r]);
            var i, o;
            return n
        }
        e.default = r
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , s = n(3)
          , i = function(t) {
            function e() {
                return null !== t && t.apply(this, arguments) || this
            }
            return r.__extends(e, t),
            e.prototype.renderSegs = function(t, e) {
                var n, r, i, o = [];
                for (this.eventRenderer.renderFgSegsIntoContainers(t, this.component.helperContainerEls),
                n = 0; n < t.length; n++)
                    r = t[n],
                    e && e.col === r.col && (i = e.el,
                    r.el.css({
                        left: i.css("left"),
                        right: i.css("right"),
                        "margin-left": i.css("margin-left"),
                        "margin-right": i.css("margin-right")
                    })),
                    o.push(r.el[0]);
                return s(o)
            }
            ,
            e
        }(n(58).default);
        e.default = i
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , i = function(t) {
            function e() {
                return null !== t && t.apply(this, arguments) || this
            }
            return r.__extends(e, t),
            e.prototype.attachSegEls = function(t, e) {
                var n, r = this.component;
                return "bgEvent" === t ? n = r.bgContainerEls : "businessHours" === t ? n = r.businessContainerEls : "highlight" === t && (n = r.highlightContainerEls),
                r.updateSegVerticals(e),
                r.attachSegsByCol(r.groupSegsByCol(e), n),
                e.map(function(t) {
                    return t.el[0]
                })
            }
            ,
            e
        }(n(57).default);
        e.default = i
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var c = n(3)
          , p = n(4)
          , r = n(7)
          , i = function() {
            function t(t) {
                this.isHidden = !0,
                this.margin = 10,
                this.options = t || {}
            }
            return t.prototype.show = function() {
                this.isHidden && (this.el || this.render(),
                this.el.show(),
                this.position(),
                this.isHidden = !1,
                this.trigger("show"))
            }
            ,
            t.prototype.hide = function() {
                this.isHidden || (this.el.hide(),
                this.isHidden = !0,
                this.trigger("hide"))
            }
            ,
            t.prototype.render = function() {
                var t = this
                  , e = this.options;
                this.el = c('<div class="fc-popover"/>').addClass(e.className || "").css({
                    top: 0,
                    left: 0
                }).append(e.content).appendTo(e.parentEl),
                this.el.on("click", ".fc-close", function() {
                    t.hide()
                }),
                e.autoHide && this.listenTo(c(document), "mousedown", this.documentMousedown)
            }
            ,
            t.prototype.documentMousedown = function(t) {
                this.el && !c(t.target).closest(this.el).length && this.hide()
            }
            ,
            t.prototype.removeElement = function() {
                this.hide(),
                this.el && (this.el.remove(),
                this.el = null),
                this.stopListeningTo(c(document), "mousedown")
            }
            ,
            t.prototype.position = function() {
                var t, e, n, r, i, o = this.options, s = this.el.offsetParent().offset(), a = this.el.outerWidth(), l = this.el.outerHeight(), u = c(window), d = p.getScrollParent(this.el);
                r = o.top || 0,
                i = void 0 !== o.left ? o.left : void 0 !== o.right ? o.right - a : 0,
                d.is(window) || d.is(document) ? (d = u,
                e = t = 0) : (t = (n = d.offset()).top,
                e = n.left),
                t += u.scrollTop(),
                e += u.scrollLeft(),
                !1 !== o.viewportConstrain && (r = Math.min(r, t + d.outerHeight() - l - this.margin),
                r = Math.max(r, t + this.margin),
                i = Math.min(i, e + d.outerWidth() - a - this.margin),
                i = Math.max(i, e + this.margin)),
                this.el.css({
                    top: r - s.top,
                    left: i - s.left
                })
            }
            ,
            t.prototype.trigger = function(t) {
                this.options[t] && this.options[t].apply(this, Array.prototype.slice.call(arguments, 1))
            }
            ,
            t
        }();
        e.default = i,
        r.default.mixInto(i)
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var i = n(2)
          , y = n(3)
          , h = n(4)
          , r = function(r) {
            function t(t, e) {
                var n = r.call(this, t, e) || this;
                return n.dayGrid = t,
                n
            }
            return i.__extends(t, r),
            t.prototype.renderBgRanges = function(t) {
                t = y.grep(t, function(t) {
                    return t.eventDef.isAllDay()
                }),
                r.prototype.renderBgRanges.call(this, t)
            }
            ,
            t.prototype.renderFgSegs = function(t) {
                var n = this.rowStructs = this.renderSegRows(t);
                this.dayGrid.rowEls.each(function(t, e) {
                    y(e).find(".fc-content-skeleton > table").append(n[t].tbodyEl)
                })
            }
            ,
            t.prototype.unrenderFgSegs = function() {
                for (var t, e = this.rowStructs || []; t = e.pop(); )
                    t.tbodyEl.remove();
                this.rowStructs = null
            }
            ,
            t.prototype.renderSegRows = function(t) {
                var e, n, r = [];
                for (e = this.groupSegRows(t),
                n = 0; n < e.length; n++)
                    r.push(this.renderSegRow(n, e[n]));
                return r
            }
            ,
            t.prototype.renderSegRow = function(t, e) {
                var n, r, i, o, s, a, l, u = this.dayGrid.colCnt, d = this.buildSegLevels(e), c = Math.max(1, d.length), p = y("<tbody/>"), h = [], f = [], g = [];
                function v(t) {
                    for (; i < t; )
                        (l = (g[n - 1] || [])[i]) ? l.attr("rowspan", parseInt(l.attr("rowspan") || 1, 10) + 1) : (l = y("<td/>"),
                        o.append(l)),
                        f[n][i] = l,
                        g[n][i] = l,
                        i++
                }
                for (n = 0; n < c; n++) {
                    if (r = d[n],
                    i = 0,
                    o = y("<tr/>"),
                    h.push([]),
                    f.push([]),
                    g.push([]),
                    r)
                        for (s = 0; s < r.length; s++) {
                            for (v((a = r[s]).leftCol),
                            l = y('<td class="fc-event-container"/>').append(a.el),
                            a.leftCol !== a.rightCol ? l.attr("colspan", a.rightCol - a.leftCol + 1) : g[n][i] = l; i <= a.rightCol; )
                                f[n][i] = l,
                                h[n][i] = a,
                                i++;
                            o.append(l)
                        }
                    v(u),
                    this.dayGrid.bookendCells(o),
                    p.append(o)
                }
                return {
                    row: t,
                    tbodyEl: p,
                    cellMatrix: f,
                    segMatrix: h,
                    segLevels: d,
                    segs: e
                }
            }
            ,
            t.prototype.buildSegLevels = function(t) {
                var e, n, r, i = [];
                for (this.sortEventSegs(t),
                e = 0; e < t.length; e++) {
                    for (n = t[e],
                    r = 0; r < i.length && o(n, i[r]); r++)
                        ;
                    (i[n.level = r] || (i[r] = [])).push(n)
                }
                for (r = 0; r < i.length; r++)
                    i[r].sort(s);
                return i
            }
            ,
            t.prototype.groupSegRows = function(t) {
                var e, n = [];
                for (e = 0; e < this.dayGrid.rowCnt; e++)
                    n.push([]);
                for (e = 0; e < t.length; e++)
                    n[t[e].row].push(t[e]);
                return n
            }
            ,
            t.prototype.computeEventTimeFormat = function() {
                return this.opt("extraSmallTimeFormat")
            }
            ,
            t.prototype.computeDisplayEventEnd = function() {
                return 1 === this.dayGrid.colCnt
            }
            ,
            t.prototype.fgSegHtml = function(t, e) {
                var n, r, i = this.view, o = t.footprint.eventDef, s = t.footprint.componentFootprint.isAllDay, a = i.isEventDefDraggable(o), l = !e && s && t.isStart && i.isEventDefResizableFromStart(o), u = !e && s && t.isEnd && i.isEventDefResizableFromEnd(o), d = this.getSegClasses(t, a, l || u), c = h.cssToStr(this.getSkinCss(o)), p = "";
                return d.unshift("fc-day-grid-event", "fc-h-event"),
                t.isStart && (n = this.getTimeText(t.footprint)) && (p = '<span class="fc-time">' + h.htmlEscape(n) + "</span>"),
                r = '<span class="fc-title">' + (h.htmlEscape(o.title || "") || "&nbsp;") + "</span>",
                '<a class="' + d.join(" ") + '"' + (o.url ? ' href="' + h.htmlEscape(o.url) + '"' : "") + (c ? ' style="' + c + '"' : "") + '><div class="fc-content">' + (this.dayGrid.isRTL ? r + " " + p : p + " " + r) + "</div>" + (l ? '<div class="fc-resizer fc-start-resizer" />' : "") + (u ? '<div class="fc-resizer fc-end-resizer" />' : "") + "</a>"
            }
            ,
            t
        }(n(42).default);
        function o(t, e) {
            var n, r;
            for (n = 0; n < e.length; n++)
                if ((r = e[n]).leftCol <= t.rightCol && r.rightCol >= t.leftCol)
                    return !0;
            return !1
        }
        function s(t, e) {
            return t.leftCol - e.leftCol
        }
        e.default = r
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , u = n(3)
          , i = function(t) {
            function e() {
                return null !== t && t.apply(this, arguments) || this
            }
            return r.__extends(e, t),
            e.prototype.renderSegs = function(t, s) {
                var a, l = [];
                return a = this.eventRenderer.renderSegRows(t),
                this.component.rowEls.each(function(t, e) {
                    var n, r, i = u(e), o = u('<div class="fc-helper-skeleton"><table/></div>');
                    s && s.row === t ? r = s.el.position().top : ((n = i.find(".fc-content-skeleton tbody")).length || (n = i.find(".fc-content-skeleton table")),
                    r = n.position().top),
                    o.css("top", r).find("table").append(a[t].tbodyEl),
                    i.append(o),
                    l.push(o[0])
                }),
                u(l)
            }
            ,
            e
        }(n(58).default);
        e.default = i
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , l = n(3)
          , i = function(e) {
            function t() {
                var t = null !== e && e.apply(this, arguments) || this;
                return t.fillSegTag = "td",
                t
            }
            return r.__extends(t, e),
            t.prototype.attachSegEls = function(t, e) {
                var n, r, i, o = [];
                for (n = 0; n < e.length; n++)
                    r = e[n],
                    i = this.renderFillRow(t, r),
                    this.component.rowEls.eq(r.row).append(i),
                    o.push(i[0]);
                return o
            }
            ,
            t.prototype.renderFillRow = function(t, e) {
                var n, r, i, o = this.component.colCnt, s = e.leftCol, a = e.rightCol + 1;
                return n = "businessHours" === t ? "bgevent" : t.toLowerCase(),
                i = (r = l('<div class="fc-' + n + '-skeleton"><table><tr/></table></div>')).find("tr"),
                0 < s && i.append('<td colspan="' + s + '"/>'),
                i.append(e.el.attr("colspan", a - s)),
                a < o && i.append('<td colspan="' + (o - a) + '"/>'),
                this.component.bookendCells(i),
                r
            }
            ,
            t
        }(n(57).default);
        e.default = i
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , i = n(228)
          , l = n(5)
          , o = function(a) {
            function t() {
                return null !== a && a.apply(this, arguments) || this
            }
            return r.__extends(t, a),
            t.prototype.buildRenderRange = function(t, e, n) {
                var r, i = a.prototype.buildRenderRange.call(this, t, e, n), o = this.msToUtcMoment(i.startMs, n), s = this.msToUtcMoment(i.endMs, n);
                return this.opt("fixedWeekCount") && (r = Math.ceil(s.diff(o, "weeks", !0)),
                s.add(6 - r, "weeks")),
                new l.default(o,s)
            }
            ,
            t
        }(i.default);
        e.default = o
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , c = n(4)
          , i = function(t) {
            function e() {
                return null !== t && t.apply(this, arguments) || this
            }
            return r.__extends(e, t),
            e.prototype.renderFgSegs = function(t) {
                t.length ? this.component.renderSegList(t) : this.component.renderEmptyMessage()
            }
            ,
            e.prototype.fgSegHtml = function(t) {
                var e, n = this.view, r = n.calendar, i = r.theme, o = t.footprint, s = o.eventDef, a = o.componentFootprint, l = s.url, u = ["fc-list-item"].concat(this.getClasses(s)), d = this.getBgColor(s);
                return e = a.isAllDay ? n.getAllDayHtml() : n.isMultiDayRange(a.unzonedRange) ? t.isStart || t.isEnd ? c.htmlEscape(this._getTimeText(r.msToMoment(t.startMs), r.msToMoment(t.endMs), a.isAllDay)) : n.getAllDayHtml() : c.htmlEscape(this.getTimeText(o)),
                l && u.push("fc-has-url"),
                '<tr class="' + u.join(" ") + '">' + (this.displayEventTime ? '<td class="fc-list-item-time ' + i.getClass("widgetContent") + '">' + (e || "") + "</td>" : "") + '<td class="fc-list-item-marker ' + i.getClass("widgetContent") + '"><span class="fc-event-dot"' + (d ? ' style="background-color:' + d + '"' : "") + '></span></td><td class="fc-list-item-title ' + i.getClass("widgetContent") + '"><a' + (l ? ' href="' + c.htmlEscape(l) + '"' : "") + ">" + c.htmlEscape(s.title || "") + "</a></td></tr>"
            }
            ,
            e.prototype.computeEventTimeFormat = function() {
                return this.opt("mediumTimeFormat")
            }
            ,
            e
        }(n(42).default);
        e.default = i
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var i = n(2)
          , o = n(3)
          , r = function(r) {
            function t() {
                return null !== r && r.apply(this, arguments) || this
            }
            return i.__extends(t, r),
            t.prototype.handleClick = function(t, e) {
                var n;
                r.prototype.handleClick.call(this, t, e),
                o(e.target).closest("a[href]").length || (n = t.footprint.eventDef.url) && !e.isDefaultPrevented() && (window.location.href = n)
            }
            ,
            t
        }(n(59).default);
        e.default = r
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(38)
          , i = n(52)
          , o = n(215)
          , s = n(216);
        r.default.registerClass(i.default),
        r.default.registerClass(o.default),
        r.default.registerClass(s.default)
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(51)
          , i = n(213)
          , o = n(214)
          , s = n(258)
          , a = n(259);
        r.defineThemeSystem("standard", i.default),
        r.defineThemeSystem("jquery-ui", o.default),
        r.defineThemeSystem("bootstrap3", s.default),
        r.defineThemeSystem("bootstrap4", a.default)
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , i = function(t) {
            function e() {
                return null !== t && t.apply(this, arguments) || this
            }
            return r.__extends(e, t),
            e
        }(n(19).default);
        (e.default = i).prototype.classes = {
            widget: "fc-bootstrap3",
            tableGrid: "table-bordered",
            tableList: "table",
            tableListHeading: "active",
            buttonGroup: "btn-group",
            button: "btn btn-default",
            stateActive: "active",
            stateDisabled: "disabled",
            today: "alert alert-info",
            popover: "panel panel-default",
            popoverHeader: "panel-heading",
            popoverContent: "panel-body",
            headerRow: "panel-default",
            dayRow: "panel-default",
            listView: "panel panel-default"
        },
        i.prototype.baseIconClass = "glyphicon",
        i.prototype.iconClasses = {
            close: "glyphicon-remove",
            prev: "glyphicon-chevron-left",
            next: "glyphicon-chevron-right",
            prevYear: "glyphicon-backward",
            nextYear: "glyphicon-forward"
        },
        i.prototype.iconOverrideOption = "bootstrapGlyphicons",
        i.prototype.iconOverrideCustomButtonOption = "bootstrapGlyphicon",
        i.prototype.iconOverridePrefix = "glyphicon-"
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(2)
          , i = function(t) {
            function e() {
                return null !== t && t.apply(this, arguments) || this
            }
            return r.__extends(e, t),
            e
        }(n(19).default);
        (e.default = i).prototype.classes = {
            widget: "fc-bootstrap4",
            tableGrid: "table-bordered",
            tableList: "table",
            tableListHeading: "table-active",
            buttonGroup: "btn-group",
            button: "btn btn-primary",
            stateActive: "active",
            stateDisabled: "disabled",
            today: "alert alert-info",
            popover: "card card-primary",
            popoverHeader: "card-header",
            popoverContent: "card-body",
            headerRow: "table-bordered",
            dayRow: "table-bordered",
            listView: "card card-primary"
        },
        i.prototype.baseIconClass = "fa",
        i.prototype.iconClasses = {
            close: "fa-times",
            prev: "fa-chevron-left",
            next: "fa-chevron-right",
            prevYear: "fa-angle-double-left",
            nextYear: "fa-angle-double-right"
        },
        i.prototype.iconOverrideOption = "bootstrapFontAwesome",
        i.prototype.iconOverrideCustomButtonOption = "bootstrapFontAwesome",
        i.prototype.iconOverridePrefix = "fa-"
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(22)
          , i = n(62)
          , o = n(229);
        r.defineView("basic", {
            class: i.default
        }),
        r.defineView("basicDay", {
            type: "basic",
            duration: {
                days: 1
            }
        }),
        r.defineView("basicWeek", {
            type: "basic",
            duration: {
                weeks: 1
            }
        }),
        r.defineView("month", {
            class: o.default,
            duration: {
                months: 1
            },
            defaults: {
                fixedWeekCount: !0
            }
        })
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(22)
          , i = n(226);
        r.defineView("agenda", {
            class: i.default,
            defaults: {
                allDaySlot: 0,
                slotDuration: "00:30:00",
                slotEventOverlap: !0
            }
        }),
        r.defineView("agendaDay", {
            type: "agenda",
            duration: {
                days: 1
            }
        }),
        r.defineView("agendaWeek", {
            type: "agenda",
            duration: {
                weeks: 1
            }
        })
    }
    , function(t, e, n) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var r = n(22)
          , i = n(230);
        r.defineView("list", {
            class: i.default,
            buttonTextKey: "list",
            defaults: {
                buttonText: "list",
                listDayFormat: "LL",
                noEventsMessage: "No events to display"
            }
        }),
        r.defineView("listDay", {
            type: "list",
            duration: {
                days: 1
            },
            defaults: {
                listDayFormat: "dddd"
            }
        }),
        r.defineView("listWeek", {
            type: "list",
            duration: {
                weeks: 1
            },
            defaults: {
                listDayFormat: "dddd",
                listDayAltFormat: "LL"
            }
        }),
        r.defineView("listMonth", {
            type: "list",
            duration: {
                month: 1
            },
            defaults: {
                listDayAltFormat: "dddd"
            }
        }),
        r.defineView("listYear", {
            type: "list",
            duration: {
                year: 1
            },
            defaults: {
                listDayAltFormat: "dddd"
            }
        })
    }
    , function(t, e) {
        Object.defineProperty(e, "__esModule", {
            value: !0
        })
    }
    ])
}),
function(t, e) {
    "object" == typeof exports && "object" == typeof module ? module.exports = e(require("fullcalendar"), require("jquery")) : "function" == typeof define && define.amd ? define(["fullcalendar", "jquery"], e) : "object" == typeof exports ? e(require("fullcalendar"), require("jquery")) : e(t.FullCalendar, t.jQuery)
}("undefined" != typeof self ? self : this, function(n, r) {
    return function(n) {
        var r = {};
        function i(t) {
            if (r[t])
                return r[t].exports;
            var e = r[t] = {
                i: t,
                l: !1,
                exports: {}
            };
            return n[t].call(e.exports, e, e.exports, i),
            e.l = !0,
            e.exports
        }
        return i.m = n,
        i.c = r,
        i.d = function(t, e, n) {
            i.o(t, e) || Object.defineProperty(t, e, {
                configurable: !1,
                enumerable: !0,
                get: n
            })
        }
        ,
        i.n = function(t) {
            var e = t && t.__esModule ? function() {
                return t.default
            }
            : function() {
                return t
            }
            ;
            return i.d(e, "a", e),
            e
        }
        ,
        i.o = function(t, e) {
            return Object.prototype.hasOwnProperty.call(t, e)
        }
        ,
        i.p = "",
        i(i.s = 266)
    }({
        1: function(t, e) {
            t.exports = n
        },
        2: function(t, e) {
            var r = Object.setPrototypeOf || {
                __proto__: []
            }instanceof Array && function(t, e) {
                t.__proto__ = e
            }
            || function(t, e) {
                for (var n in e)
                    e.hasOwnProperty(n) && (t[n] = e[n])
            }
            ;
            e.__extends = function(t, e) {
                function n() {
                    this.constructor = t
                }
                r(t, e),
                t.prototype = null === e ? Object.create(e) : (n.prototype = e.prototype,
                new n)
            }
        },
        266: function(t, e, n) {
            Object.defineProperty(e, "__esModule", {
                value: !0
            });
            var r = n(1)
              , i = n(267);
            r.EventSourceParser.registerClass(i.default),
            r.GcalEventSource = i.default
        },
        267: function(t, e, n) {
            Object.defineProperty(e, "__esModule", {
                value: !0
            });
            var r = n(2)
              , d = n(3)
              , c = n(1)
              , i = function(t) {
                function e() {
                    return null !== t && t.apply(this, arguments) || this
                }
                return r.__extends(e, t),
                e.parse = function(t, e) {
                    var n;
                    return "object" == typeof t ? n = t : "string" == typeof t && (n = {
                        url: t
                    }),
                    !!n && c.EventSource.parse.call(this, n, e)
                }
                ,
                e.prototype.fetch = function(t, e, n) {
                    var a = this
                      , r = this.buildUrl()
                      , l = this.buildRequestParams(t, e, n)
                      , i = this.ajaxSettings || {}
                      , u = i.success;
                    return l ? (this.calendar.pushLoading(),
                    c.Promise.construct(function(o, s) {
                        d.ajax(d.extend({}, c.JsonFeedEventSource.AJAX_DEFAULTS, i, {
                            url: r,
                            data: l,
                            success: function(t, e, n) {
                                var r, i;
                                a.calendar.popLoading(),
                                t.error ? (a.reportError("Google Calendar API: " + t.error.message, t.error.errors),
                                s()) : t.items && (r = a.gcalItemsToRawEventDefs(t.items, l.timeZone),
                                i = c.applyAll(u, a, [t, e, n]),
                                d.isArray(i) && (r = i),
                                o(a.parseEventDefs(r)))
                            },
                            error: function(t, e, n) {
                                a.reportError("Google Calendar network failure: " + e, [t, n]),
                                a.calendar.popLoading(),
                                s()
                            }
                        }))
                    })) : c.Promise.reject()
                }
                ,
                e.prototype.gcalItemsToRawEventDefs = function(t, e) {
                    var n = this;
                    return t.map(function(t) {
                        return n.gcalItemToRawEventDef(t, e)
                    })
                }
                ,
                e.prototype.gcalItemToRawEventDef = function(t, e) {
                    var r, n = t.htmlLink || null;
                    return n && e && (r = "ctz=" + e,
                    n = n.replace(/(\?.*?)?(#|$)/, function(t, e, n) {
                        return (e ? e + "&" : "?") + r + n
                    })),
                    {
                        id: t.id,
                        title: t.summary,
                        start: t.start.dateTime || t.start.date,
                        end: t.end.dateTime || t.end.date,
                        url: n,
                        location: t.location,
                        description: t.description
                    }
                }
                ,
                e.prototype.buildUrl = function() {
                    return e.API_BASE + "/" + encodeURIComponent(this.googleCalendarId) + "/events?callback=?"
                }
                ,
                e.prototype.buildRequestParams = function(t, e, n) {
                    var r, i = this.googleCalendarApiKey || this.calendar.opt("googleCalendarApiKey");
                    return i ? (t.hasZone() || (t = t.clone().utc().add(-1, "day")),
                    e.hasZone() || (e = e.clone().utc().add(1, "day")),
                    r = d.extend(this.ajaxSettings.data || {}, {
                        key: i,
                        timeMin: t.format(),
                        timeMax: e.format(),
                        singleEvents: !0,
                        maxResults: 9999
                    }),
                    n && "local" !== n && (r.timeZone = n.replace(" ", "_")),
                    r) : (this.reportError("Specify a googleCalendarApiKey. See http://fullcalendar.io/docs/google_calendar/"),
                    null)
                }
                ,
                e.prototype.reportError = function(t, e) {
                    var n = this.calendar
                      , r = n.opt("googleCalendarError")
                      , i = e || [{
                        message: t
                    }];
                    this.googleCalendarError && this.googleCalendarError.apply(n, i),
                    r && r.apply(n, i),
                    c.warn.apply(null, [t].concat(e || []))
                }
                ,
                e.prototype.getPrimitive = function() {
                    return this.googleCalendarId
                }
                ,
                e.prototype.applyManualStandardProps = function(t) {
                    var e = c.EventSource.prototype.applyManualStandardProps.apply(this, arguments)
                      , n = t.googleCalendarId;
                    return null == n && t.url && (n = function(t) {
                        var e;
                        {
                            if (/^[^\/]+@([^\/\.]+\.)*(google|googlemail|gmail)\.com$/.test(t))
                                return t;
                            if ((e = /^https:\/\/www.googleapis.com\/calendar\/v3\/calendars\/([^\/]*)/.exec(t)) || (e = /^https?:\/\/www.google.com\/calendar\/feeds\/([^\/]*)/.exec(t)))
                                return decodeURIComponent(e[1])
                        }
                    }(t.url)),
                    null != n && (this.googleCalendarId = n,
                    e)
                }
                ,
                e.prototype.applyMiscProps = function(t) {
                    this.ajaxSettings || (this.ajaxSettings = {}),
                    d.extend(this.ajaxSettings, t)
                }
                ,
                e.API_BASE = "https://www.googleapis.com/calendar/v3/calendars",
                e
            }(c.EventSource);
            (e.default = i).defineStandardProps({
                url: !1,
                googleCalendarId: !1,
                googleCalendarApiKey: !0,
                googleCalendarError: !0
            })
        },
        3: function(t, e) {
            t.exports = r
        }
    })
});
