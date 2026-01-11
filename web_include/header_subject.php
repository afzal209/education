<!DOCTYPE html>
<html lang="en-US">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script id="bv-lazyload-images" data-cfasync="false">
        document.addEventListener("readystatechange", t => {
            "interactive" === document.readyState && handle_lazyload_images()
        });
        var lazyload_events = ["mousemove", "click", "keydown", "wheel", "touchmove", "touchend"];

        function add_lazyload_image_event_listeners(e) {
            lazyload_events.forEach(function(t) {
                document.addEventListener(t, e, !0)
            })
        }

        function remove_lazyload_image_event_listeners() {
            lazyload_events.forEach(function(t) {
                document.removeEventListener(t, handle_lazyload_images, !0)
            })
        }

        function handle_lazyload_images() {
            var c = JSON.parse('[{"declaration":"dXJsKCJodHRwczovL21vYWx5bTk4OWEuYi1jZG4ubmV0L3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDIzLzA5L2hoaGhoLTEud2VicD9idl9ob3N0PW1vYWx5bS5jb20iKQ==","selector":"LmVsZW1lbnRvci02NzggLmVsZW1lbnRvci1lbGVtZW50LmVsZW1lbnRvci1lbGVtZW50LTIwZDczMjBmIC5lbGVtZW50b3ItcmVwZWF0ZXItaXRlbS02ODM0ZDhjIC5zd2lwZXItc2xpZGUtYmc=","bg_property":"background-image"},{"declaration":"dXJsKCJodHRwczovL21vYWx5bTk4OWEuYi1jZG4ubmV0L3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDIzLzA5L2doZmhkZi0xLndlYnA/YnZfaG9zdD1tb2FseW0uY29tIik=","selector":"LmVsZW1lbnRvci02NzggLmVsZW1lbnRvci1lbGVtZW50LmVsZW1lbnRvci1lbGVtZW50LTIwZDczMjBmIC5lbGVtZW50b3ItcmVwZWF0ZXItaXRlbS0zYmViYzhjIC5zd2lwZXItc2xpZGUtYmc=","bg_property":"background-image"},{"declaration":"dXJsKCJodHRwczovL21vYWx5bTk4OWEuYi1jZG4ubmV0L3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDIzLzA5L2RmaGRmLTEud2VicD9idl9ob3N0PW1vYWx5bS5jb20iKQ==","selector":"LmVsZW1lbnRvci02NzggLmVsZW1lbnRvci1lbGVtZW50LmVsZW1lbnRvci1lbGVtZW50LTIwZDczMjBmIC5lbGVtZW50b3ItcmVwZWF0ZXItaXRlbS03M2Y3MDI0IC5zd2lwZXItc2xpZGUtYmc=","bg_property":"background-image"},{"declaration":"dXJsKCJodHRwczovL21vYWx5bTk4OWEuYi1jZG4ubmV0L3dwLWNvbnRlbnQvcGx1Z2lucy9lbGVtZW50c2tpdC1saXRlL3dpZGdldHMvaW5pdC9hc3NldHMvaW1nL2Fycm93LnBuZz9idl9ob3N0PW1vYWx5bS5jb20iKQ==","selector":"dGFibGUuZGF0YVRhYmxlIHRoZWFkIC5zb3J0aW5n","bg_property":"background-image"},{"declaration":"dXJsKCJodHRwczovL21vYWx5bTk4OWEuYi1jZG4ubmV0L3dwLWNvbnRlbnQvcGx1Z2lucy9lbGVtZW50c2tpdC1saXRlL3dpZGdldHMvaW5pdC9hc3NldHMvaW1nL3NvcnRfYXNjLnBuZz9idl9ob3N0PW1vYWx5bS5jb20iKQ==","selector":"dGFibGUuZGF0YVRhYmxlIHRoZWFkIC5zb3J0aW5nX2FzYw==","bg_property":"background-image"},{"declaration":"dXJsKCJodHRwczovL21vYWx5bTk4OWEuYi1jZG4ubmV0L3dwLWNvbnRlbnQvcGx1Z2lucy9lbGVtZW50c2tpdC1saXRlL3dpZGdldHMvaW5pdC9hc3NldHMvaW1nL3NvcnRfZGVzYy5wbmc/YnZfaG9zdD1tb2FseW0uY29tIik=","selector":"dGFibGUuZGF0YVRhYmxlIHRoZWFkIC5zb3J0aW5nX2Rlc2M=","bg_property":"background-image"},{"declaration":"dXJsKCJodHRwczovL21vYWx5bTk4OWEuYi1jZG4ubmV0L3dwLWNvbnRlbnQvcGx1Z2lucy9lbGVtZW50c2tpdC1saXRlL3dpZGdldHMvaW5pdC9hc3NldHMvaW1nL3NvcnRfYXNjX2Rpc2FibGVkLnBuZz9idl9ob3N0PW1vYWx5bS5jb20iKQ==","selector":"dGFibGUuZGF0YVRhYmxlIHRoZWFkIC5zb3J0aW5nX2FzY19kaXNhYmxlZA==","bg_property":"background-image"},{"declaration":"dXJsKCJodHRwczovL21vYWx5bTk4OWEuYi1jZG4ubmV0L3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDIzLzA5L2hoaGhoLTEud2VicD9idl9ob3N0PW1vYWx5bS5hZG5hbmlkcmVlcy5jb20iKQ==","selector":"LmVsZW1lbnRvci02NzggLmVsZW1lbnRvci1lbGVtZW50LmVsZW1lbnRvci1lbGVtZW50LTIwZDczMjBmIC5lbGVtZW50b3ItcmVwZWF0ZXItaXRlbS02ODM0ZDhjIC5zd2lwZXItc2xpZGUtYmc=","bg_property":"background-image"},{"declaration":"dXJsKCJodHRwczovL21vYWx5bTk4OWEuYi1jZG4ubmV0L3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDIzLzA5L2doZmhkZi0xLndlYnA/YnZfaG9zdD1tb2FseW0uYWRuYW5pZHJlZXMuY29tIik=","selector":"LmVsZW1lbnRvci02NzggLmVsZW1lbnRvci1lbGVtZW50LmVsZW1lbnRvci1lbGVtZW50LTIwZDczMjBmIC5lbGVtZW50b3ItcmVwZWF0ZXItaXRlbS0zYmViYzhjIC5zd2lwZXItc2xpZGUtYmc=","bg_property":"background-image"},{"declaration":"dXJsKCJodHRwczovL21vYWx5bTk4OWEuYi1jZG4ubmV0L3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDIzLzA5L2RmaGRmLTEud2VicD9idl9ob3N0PW1vYWx5bS5hZG5hbmlkcmVlcy5jb20iKQ==","selector":"LmVsZW1lbnRvci02NzggLmVsZW1lbnRvci1lbGVtZW50LmVsZW1lbnRvci1lbGVtZW50LTIwZDczMjBmIC5lbGVtZW50b3ItcmVwZWF0ZXItaXRlbS03M2Y3MDI0IC5zd2lwZXItc2xpZGUtYmc=","bg_property":"background-image"},{"declaration":"dXJsKCJodHRwczovL21vYWx5bTk4OWEuYi1jZG4ubmV0L3dwLWNvbnRlbnQvcGx1Z2lucy9hZGRvbi1lbGVtZW50cy1mb3ItZWxlbWVudG9yLXBhZ2UtYnVpbGRlci9hc3NldHMvZGlnaXQtc2VwLXN2Zy5zdmc/YnZfaG9zdD1tb2FseW0uY29tIik=","selector":"W2RhdGEtZWxlbWVudF90eXBlPSJlYWUtZXZlcmdyZWVuLXRpbWVyLnNraW40Il0gLmRpZ2l0LXNlcGFyYXRvcg==","bg_property":"background-image"},{"declaration":"dXJsKCJodHRwczovL21vYWx5bTk4OWEuYi1jZG4ubmV0L3dwLWNvbnRlbnQvcGx1Z2lucy9hZGRvbi1lbGVtZW50cy1mb3ItZWxlbWVudG9yLXBhZ2UtYnVpbGRlci9hc3NldHMvZGlnaXRzLXN2Zy1hbHBoYS5zdmc/YnZfaG9zdD1tb2FseW0uY29tIik=","selector":"W2RhdGEtZWxlbWVudF90eXBlPSJlYWUtZXZlcmdyZWVuLXRpbWVyLnNraW40Il0gLmRpZ2l0","bg_property":"background-image"}]');
            if ("IntersectionObserver" in window) {
                var r = [],
                    n = [];
                const d = new IntersectionObserver(function(t) {
                    t.map(o => {
                        if (o.isIntersecting) {
                            let c, b;
                            if (r.forEach(t => {
                                    if (t.target === o.target) {
                                        c = t.declaration, b = t.property;
                                        const e = navigator.userAgent;
                                        e.match(/firefox|fxios/i) && "background" == b && (b = "background-image"), n.push(t.selector)
                                    }
                                }), c) {
                                let l = getComputedStyle(o.target)[b],
                                    t = l.match(/url\(['"]data:image.*?['"]\)/g);
                                var a = c.match(/url\(['"].*?['"]\)/g);
                                if (t && 0 < t.length && a && 0 < a.length) {
                                    let e = a[a.length - 1];
                                    t.forEach(t => {
                                        l = l.replace(t, e)
                                    }), o.target.style.setProperty(b, l, "important")
                                } else o.target.style.setProperty(b, c, "important")
                            } else console.log("DECLARATION_NOT_FOUND : " + o);
                            d.unobserve(o.target)
                        }
                    })
                });
                var b = !1,
                    o = !1;

                function a(t, l) {
                    t.forEach(e => {
                        let b = atob(e.selector);
                        if (t = b, !(-1 < l.indexOf(t))) {
                            let l = atob(e.declaration),
                                c = e.bg_property,
                                t = [];
                            try {
                                t = document.querySelectorAll(b)
                            } catch (t) {
                                console.log(t)
                            }
                            t.forEach(t => {
                                let e = getComputedStyle(t);
                                e.backgroundImage.includes("data:image/svg+xml") && (r.push({
                                    target: t,
                                    declaration: l,
                                    property: c,
                                    selector: b
                                }), d.observe(t))
                            })
                        }
                        var t
                    })
                }
                addEventListener("load", () => {
                    o = !0
                }), a(c, n), addEventListener("mouseout", () => {
                    !b && o && setTimeout(function() {
                        a(c, n), b = !0
                    }, 500)
                });
                const i = new IntersectionObserver(function(t) {
                    t.map(t => {
                        var e;
                        t.isIntersecting && (e = t.target.getAttribute("bv-data-style"), console.log(e), e ? t.target.setAttribute("style", e) : console.log("BV_STYLE_ATTRIBUTE_NOT_FOUND : " + t), i.unobserve(t.target))
                    })
                });
                let t = document.querySelectorAll(".bv-lazyload-bg-style");
                t.forEach(t => {
                    i.observe(t)
                });
                const s = new IntersectionObserver(function(t) {
                    t.map(t => {
                        var e;
                        t.isIntersecting && ((e = t.target.getAttribute("bv-data-src")) && t.target.setAttribute("src", e), s.unobserve(t.target))
                    })
                });
                let e = document.querySelectorAll(".bv-lazyload-tag-img");
                e.forEach(t => {
                    s.observe(t)
                });
                const v = new IntersectionObserver(function(t) {
                    t.map(t => {
                        if (t.isIntersecting) {
                            var l = t.target.children;
                            for (let e = 0; e < l.length; e++) {
                                let t = l[e];
                                var c = t.getAttribute("bv-data-srcset"),
                                    b = t.getAttribute("bv-data-src");
                                c && t.setAttribute("srcset", c), b && t.setAttribute("src", b)
                            }
                            v.unobserve(t.target)
                        }
                    })
                });
                let l = document.querySelectorAll(".bv-lazyload-picture");
                l.forEach(t => {
                    v.observe(t)
                })
            } else {
                c.forEach(t => {
                    let e = atob(t.declaration);
                    t = atob(t.selector);
                    let l = document.querySelectorAll(t);
                    l.forEach(t => {
                        t.style = e
                    })
                });
                let t = document.querySelectorAll(".bv-lazyload-bg-style");
                t.forEach(t => {
                    var e = t.getAttribute("bv-data-style");
                    console.log(e), e ? t.setAttribute("style", e) : console.log("BV_STYLE_ATTRIBUTE_NOT_FOUND: " + entry)
                });
                document.querySelectorAll(".bv-lazyload-tag-img");
                t.forEach(t => {
                    var e = t.getAttribute("bv-data-src"),
                        l = t.getAttribute("bv-data-srcset");
                    l && t.setAttribute("srcset", l), e && t.setAttribute("src", e), e || l || console.log("IMAGE_URL_NOT_FOUND : " + t)
                })
            }
        }
    </script>

    <meta charset="UTF-8">
    <meta name='robots' content='noindex, nofollow' />
    <?php require_once 'function/title_script.php';?>
    <title>Moalym - </title>
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="9th Class - Moalym" />
    <meta property="og:description" content="Add Your Heading Text Here Compulsory Subjects (Science Group) English Urdu Geography Islamyat Compulsory Pakistan Study Tarjuma ul Quran English Urdu Geography Islamyat Compulsory Pakistan Study Tarjuma ul Quran Elective Subjects (Science Group) Mathematics Physics Chemistry Biology Computer Science Mathematic Physics Chemistry Biology Computer Science Compulsory Subject (Arts Group) English Urdu Islamiyat Geography of Pakistan ... Read more"
    />
    <meta property="og:url" content="https://moalym.com/9th-class/" />
    <meta property="og:site_name" content="Moalym" />
    <meta property="article:modified_time" content="2023-09-30T10:02:29+00:00" />
    <meta property="og:image" content="https://moalym.com/wp-content/uploads/2023/09/WhatsApp-Image-2023-09-19-at-7.33.23-PM.jpeg" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:label1" content="Est. reading time" />
    <meta name="twitter:data1" content="1 minute" />
    <script type="application/ld+json" class="yoast-schema-graph">
        {
            "@context": "https://schema.org",
            "@graph": [{
                "@type": "WebPage",
                "@id": "https://moalym.com/9th-class/",
                "url": "https://moalym.com/9th-class/",
                "name": "9th Class - Moalym",
                "isPartOf": {
                    "@id": "https://moalym.com/#website"
                },
                "primaryImageOfPage": {
                    "@id": "https://moalym.com/9th-class/#primaryimage"
                },
                "image": {
                    "@id": "https://moalym.com/9th-class/#primaryimage"
                },
                "thumbnailUrl": "https://moalym.com/wp-content/uploads/2023/09/WhatsApp-Image-2023-09-19-at-7.33.23-PM.jpeg",
                "datePublished": "2023-09-17T11:37:40+00:00",
                "dateModified": "2023-09-30T10:02:29+00:00",
                "breadcrumb": {
                    "@id": "https://moalym.com/9th-class/#breadcrumb"
                },
                "inLanguage": "en-US",
                "potentialAction": [{
                    "@type": "ReadAction",
                    "target": ["https://moalym.com/9th-class/"]
                }]
            }, {
                "@type": "ImageObject",
                "inLanguage": "en-US",
                "@id": "https://moalym.com/9th-class/#primaryimage",
                "url": "https://moalym.com/wp-content/uploads/2023/09/WhatsApp-Image-2023-09-19-at-7.33.23-PM.jpeg",
                "contentUrl": "https://moalym.com/wp-content/uploads/2023/09/WhatsApp-Image-2023-09-19-at-7.33.23-PM.jpeg",
                "width": 501,
                "height": 500
            }, {
                "@type": "BreadcrumbList",
                "@id": "https://moalym.com/9th-class/#breadcrumb",
                "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "name": "Home",
                    "item": "https://moalym.com/"
                }, {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "9th Class"
                }]
            }, {
                "@type": "WebSite",
                "@id": "https://moalym.com/#website",
                "url": "https://moalym.com/",
                "name": "Moalym",
                "description": "Learn Easily",
                "potentialAction": [{
                    "@type": "SearchAction",
                    "target": {
                        "@type": "EntryPoint",
                        "urlTemplate": "https://moalym.com/?s={search_term_string}"
                    },
                    "query-input": "required name=search_term_string"
                }],
                "inLanguage": "en-US"
            }]
        }
    </script>



    <link rel="alternate" type="application/rss+xml" title="Moalym &raquo; Feed" href="https://moalym.com/feed/" />
    <link rel="alternate" type="application/rss+xml" title="Moalym &raquo; Comments Feed" href="https://moalym.com/comments/feed/" />
    <script>
        window._wpemojiSettings = {
            "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/72x72\/",
            "ext": ".png",
            "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/svg\/",
            "svgExt": ".svg",
            "source": {
                "concatemoji": "https:\/\/moalym.com\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.4.1"
            }
        };
        /*! This file is auto-generated */
        ! function(i, n) {
            var o, s, e;

            function c(e) {
                try {
                    var t = {
                        supportTests: e,
                        timestamp: (new Date).valueOf()
                    };
                    sessionStorage.setItem(o, JSON.stringify(t))
                } catch (e) {}
            }

            function p(e, t, n) {
                e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(t, 0, 0);
                var t = new Uint32Array(e.getImageData(0, 0, e.canvas.width, e.canvas.height).data),
                    r = (e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(n, 0, 0), new Uint32Array(e.getImageData(0, 0, e.canvas.width, e.canvas.height).data));
                return t.every(function(e, t) {
                    return e === r[t]
                })
            }

            function u(e, t, n) {
                switch (t) {
                    case "flag":
                        return n(e, "\ud83c\udff3\ufe0f\u200d\u26a7\ufe0f", "\ud83c\udff3\ufe0f\u200b\u26a7\ufe0f") ? !1 : !n(e, "\ud83c\uddfa\ud83c\uddf3", "\ud83c\uddfa\u200b\ud83c\uddf3") && !n(e, "\ud83c\udff4\udb40\udc67\udb40\udc62\udb40\udc65\udb40\udc6e\udb40\udc67\udb40\udc7f", "\ud83c\udff4\u200b\udb40\udc67\u200b\udb40\udc62\u200b\udb40\udc65\u200b\udb40\udc6e\u200b\udb40\udc67\u200b\udb40\udc7f");
                    case "emoji":
                        return !n(e, "\ud83e\udef1\ud83c\udffb\u200d\ud83e\udef2\ud83c\udfff", "\ud83e\udef1\ud83c\udffb\u200b\ud83e\udef2\ud83c\udfff")
                }
                return !1
            }

            function f(e, t, n) {
                var r = "undefined" != typeof WorkerGlobalScope && self instanceof WorkerGlobalScope ? new OffscreenCanvas(300, 150) : i.createElement("canvas"),
                    a = r.getContext("2d", {
                        willReadFrequently: !0
                    }),
                    o = (a.textBaseline = "top", a.font = "600 32px Arial", {});
                return e.forEach(function(e) {
                    o[e] = t(a, e, n)
                }), o
            }

            function t(e) {
                var t = i.createElement("script");
                t.src = e, t.defer = !0, i.head.appendChild(t)
            }
            "undefined" != typeof Promise && (o = "wpEmojiSettingsSupports", s = ["flag", "emoji"], n.supports = {
                everything: !0,
                everythingExceptFlag: !0
            }, e = new Promise(function(e) {
                i.addEventListener("DOMContentLoaded", e, {
                    once: !0
                })
            }), new Promise(function(t) {
                var n = function() {
                    try {
                        var e = JSON.parse(sessionStorage.getItem(o));
                        if ("object" == typeof e && "number" == typeof e.timestamp && (new Date).valueOf() < e.timestamp + 604800 && "object" == typeof e.supportTests) return e.supportTests
                    } catch (e) {}
                    return null
                }();
                if (!n) {
                    if ("undefined" != typeof Worker && "undefined" != typeof OffscreenCanvas && "undefined" != typeof URL && URL.createObjectURL && "undefined" != typeof Blob) try {
                        var e = "postMessage(" + f.toString() + "(" + [JSON.stringify(s), u.toString(), p.toString()].join(",") + "));",
                            r = new Blob([e], {
                                type: "text/javascript"
                            }),
                            a = new Worker(URL.createObjectURL(r), {
                                name: "wpTestEmojiSupports"
                            });
                        return void(a.onmessage = function(e) {
                            c(n = e.data), a.terminate(), t(n)
                        })
                    } catch (e) {}
                    c(n = f(s, u, p))
                }
                t(n)
            }).then(function(e) {
                for (var t in e) n.supports[t] = e[t], n.supports.everything = n.supports.everything && n.supports[t], "flag" !== t && (n.supports.everythingExceptFlag = n.supports.everythingExceptFlag && n.supports[t]);
                n.supports.everythingExceptFlag = n.supports.everythingExceptFlag && !n.supports.flag, n.DOMReady = !1, n.readyCallback = function() {
                    n.DOMReady = !0
                }
            }).then(function() {
                return e
            }).then(function() {
                var e;
                n.supports.everything || (n.readyCallback(), (e = n.source || {}).concatemoji ? t(e.concatemoji) : e.wpemoji && e.twemoji && (t(e.twemoji), t(e.wpemoji)))
            }))
        }((window, document), window._wpemojiSettings);
    </script>

    <link rel='stylesheet' id='wp-block-library-css' href='https://moalym.com/wp-includes/css/dist/block-library/style.min.css?ver=6.4.1' media='all' />

    <link rel='stylesheet' id='quiz-maker-css' href='https://moalym.com/wp-content/plugins/quiz-maker/public/css/quiz-maker-public.css?ver=6.4.9.3' media='all' />
    <link rel='stylesheet' id='eae-css-css' href='https://moalym.com/wp-content/plugins/addon-elements-for-elementor-page-builder/assets/css/eae.min.css?ver=1.12.8' media='all' />
    <link rel='stylesheet' id='font-awesome-4-shim-css' href='https://moalym.com/wp-content/plugins/elementor/assets/lib/font-awesome/css/v4-shims.min.css?ver=1.0' media='all' />
    <link rel='stylesheet' id='font-awesome-5-all-css' href='https://moalym.com/wp-content/plugins/elementor/assets/lib/font-awesome/css/all.min.css?ver=1.0' media='all' />
    <link rel='stylesheet' id='vegas-css-css' href='https://moalym.com/wp-content/plugins/addon-elements-for-elementor-page-builder/assets/lib/vegas/vegas.min.css?ver=2.4.0' media='all' />
    <link rel='stylesheet' id='hfe-style-css' href='https://moalym.com/wp-content/plugins/header-footer-elementor/assets/css/header-footer-elementor.css?ver=1.6.17' media='all' />
    <link rel='stylesheet' id='elementor-icons-css' href='https://moalym.com/wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min.css?ver=5.23.0' media='all' />
    <link rel='stylesheet' id='elementor-frontend-css' href='https://moalym.com/wp-content/plugins/elementor/assets/css/frontend-lite.min.css?ver=3.17.3' media='all' />
    <link rel='stylesheet' id='swiper-css' href='https://moalym.com/wp-content/plugins/elementor/assets/lib/swiper/v8/css/swiper.min.css?ver=8.4.5' media='all' />
    <link rel='stylesheet' id='elementor-post-5-css' href='https://moalym.com/wp-content/uploads/elementor/css/post-5.css?ver=1699486797' media='all' />
    <link rel='stylesheet' id='elementor-pro-css' href='https://moalym.com/wp-content/plugins/pro-elements/assets/css/frontend-lite.min.css?ver=3.16.2' media='all' />
    <link rel='stylesheet' id='elementor-global-css' href='https://moalym.com/wp-content/uploads/elementor/css/global.css?ver=1699486799' media='all' />
    <link rel='stylesheet' id='elementor-post-1474-css' href='https://moalym.com/wp-content/uploads/elementor/css/post-1474.css?ver=1699543918' media='all' />
    <link rel='stylesheet' id='quiz-maker-admin-css' href='https://moalym.com/wp-content/plugins/quiz-maker/admin/css/admin.css?ver=6.4.9.3' media='all' />
    <link rel='stylesheet' id='hfe-widgets-style-css' href='https://moalym.com/wp-content/plugins/header-footer-elementor/inc/widgets-css/frontend.css?ver=1.6.17' media='all' />
    <link rel='stylesheet' id='elementor-post-717-css' href='https://moalym.com/wp-content/uploads/elementor/css/post-717.css?ver=1699486799' media='all' />
    <link rel='stylesheet' id='elementor-post-1202-css' href='https://moalym.com/wp-content/uploads/elementor/css/post-1202.css?ver=1699486799' media='all' />
    <link rel='stylesheet' id='generate-style-css' href='https://moalym.com/wp-content/themes/generatepress/assets/css/main.min.css?ver=3.3.1' media='all' />

    <link rel='stylesheet' id='elementor-icons-ekiticons-css' href='https://moalym.com/wp-content/plugins/elementskit-lite/modules/elementskit-icon-pack/assets/css/ekiticons.css?ver=3.0.2' media='all' />
    <link rel='stylesheet' id='ekit-widget-styles-css' href='https://moalym.com/wp-content/plugins/elementskit-lite/widgets/init/assets/css/widget-styles.css?ver=3.0.2' media='all' />
    <link rel='stylesheet' id='ekit-responsive-css' href='https://moalym.com/wp-content/plugins/elementskit-lite/widgets/init/assets/css/responsive.css?ver=3.0.2' media='all' />
    <link rel='stylesheet' id='eael-general-css' href='https://moalym.com/wp-content/plugins/essential-addons-for-elementor-lite/assets/front-end/css/view/general.min.css?ver=5.8.18' media='all' />
    <link rel='stylesheet' id='google-fonts-1-css' href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CLato%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Flex%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;display=swap&#038;ver=6.4.1'
        media='all' />
    <link rel='stylesheet' id='elementor-icons-shared-0-css' href='https://moalym.com/wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min.css?ver=5.15.3' media='all' />
    <link rel='stylesheet' id='elementor-icons-fa-solid-css' href='https://moalym.com/wp-content/plugins/elementor/assets/lib/font-awesome/css/solid.min.css?ver=5.15.3' media='all' />
    <link rel='stylesheet' id='elementor-icons-fa-brands-css' href='https://moalym.com/wp-content/plugins/elementor/assets/lib/font-awesome/css/brands.min.css?ver=5.15.3' media='all' />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <script src="https://moalym.com/wp-content/plugins/addon-elements-for-elementor-page-builder/assets/js/iconHelper.js?ver=1.0" id="eae-iconHelper-js"></script>
    <script src="https://moalym.com/wp-includes/js/jquery/jquery.min.js?ver=3.7.1" id="jquery-core-js"></script>
    <script src="https://moalym.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.4.1" id="jquery-migrate-js"></script>
    <link rel="https://api.w.org/" href="https://moalym.com/wp-json/" />
    <link rel="alternate" type="application/json" href="https://moalym.com/wp-json/wp/v2/pages/1474" />
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://moalym.com/xmlrpc.php?rsd" />
    <meta name="generator" content="WordPress 6.4.1" />
    <link rel='shortlink' href='https://moalym.com/?p=1474' />
    <link rel="alternate" type="application/json+oembed" href="https://moalym.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fmoalym.com%2F9th-class%2F" />
    <link rel="alternate" type="text/xml+oembed" href="https://moalym.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fmoalym.com%2F9th-class%2F&#038;format=xml" />
    <meta name="generator" content="Elementor 3.17.3; features: e_dom_optimization, e_optimized_assets_loading, e_optimized_css_loading, additional_custom_breakpoints; settings: css_print_method-external, google_font-enabled, font_display-swap">
    <link rel="stylesheet" href="web_asset/css/style.css">
    
    
</head>

<body class="page-template page-template-elementor_header_footer page page-id-1474 wp-embed-responsive ehf-header ehf-footer ehf-template-generatepress ehf-stylesheet-generatepress right-sidebar nav-below-header separate-containers header-aligned-left dropdown-hover elementor-default elementor-template-full-width elementor-kit-5 elementor-page elementor-page-1474 full-width-content"
    itemtype="https://schema.org/WebPage" itemscope>