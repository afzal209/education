<!DOCTYPE html>
<html lang="en-US">

<head>
<script id="bv-lazyload-images" data-cfasync="false">
        document.addEventListener("readystatechange", e => {
            "interactive" === document.readyState && handle_lazyload_images()
        });
        var lazyload_events = ["mousemove", "click", "keydown", "wheel", "touchmove", "touchend"];

        function add_lazyload_image_event_listeners(t) {
            lazyload_events.forEach(function(e) {
                document.addEventListener(e, t, !0)
            })
        }

        function remove_lazyload_image_event_listeners() {
            lazyload_events.forEach(function(e) {
                document.removeEventListener(e, handle_lazyload_images, !0)
            })
        }

        function handle_lazyload_images() {
            var a = JSON.parse("[]");
            if ("IntersectionObserver" in window) {
                var s = [],
                    c = [];
                const i = new IntersectionObserver(function(e) {
                    e.map(n => {
                        if (n.isIntersecting) {
                            let a, o;
                            if (s.forEach(e => {
                                    if (e.target === n.target) {
                                        a = e.declaration, o = e.property;
                                        const t = navigator.userAgent;
                                        t.match(/firefox|fxios/i) && "background" == o && (o = "background-image"), c.push(e.selector)
                                    }
                                }), a) {
                                let r = getComputedStyle(n.target)[o],
                                    e = r.match(/url\(['"]data:image.*?['"]\)/g);
                                var l = a.match(/url\(['"].*?['"]\)/g);
                                if (e && 0 < e.length && l && 0 < l.length) {
                                    let t = l[l.length - 1];
                                    e.forEach(e => {
                                        r = r.replace(e, t)
                                    }), n.target.style.setProperty(o, r, "important")
                                } else n.target.style.setProperty(o, a, "important")
                            } else console.log("DECLARATION_NOT_FOUND : " + n);
                            i.unobserve(n.target)
                        }
                    })
                });
                var o = !1,
                    n = !1;

                function l(e, r) {
                    e.forEach(t => {
                        let o = atob(t.selector);
                        if (e = o, !(-1 < r.indexOf(e))) {
                            let r = atob(t.declaration),
                                a = t.bg_property,
                                e = [];
                            try {
                                e = document.querySelectorAll(o)
                            } catch (e) {
                                console.log(e)
                            }
                            e.forEach(e => {
                                let t = getComputedStyle(e);
                                t.backgroundImage.includes("data:image/svg+xml") && (s.push({
                                    target: e,
                                    declaration: r,
                                    property: a,
                                    selector: o
                                }), i.observe(e))
                            })
                        }
                        var e
                    })
                }
                addEventListener("load", () => {
                    n = !0
                }), l(a, c), addEventListener("mouseout", () => {
                    !o && n && setTimeout(function() {
                        l(a, c), o = !0
                    }, 500)
                });
                const u = new IntersectionObserver(function(e) {
                    e.map(e => {
                        var t;
                        e.isIntersecting && (t = e.target.getAttribute("bv-data-style"), console.log(t), t ? e.target.setAttribute("style", t) : console.log("BV_STYLE_ATTRIBUTE_NOT_FOUND : " + e), u.unobserve(e.target))
                    })
                });
                let e = document.querySelectorAll(".bv-lazyload-bg-style");
                e.forEach(e => {
                    u.observe(e)
                });
                const d = new IntersectionObserver(function(e) {
                    e.map(e => {
                        var t;
                        e.isIntersecting && ((t = e.target.getAttribute("bv-data-src")) && e.target.setAttribute("src", t), d.unobserve(e.target))
                    })
                });
                let t = document.querySelectorAll(".bv-lazyload-tag-img");
                t.forEach(e => {
                    d.observe(e)
                });
                const g = new IntersectionObserver(function(e) {
                    e.map(e => {
                        if (e.isIntersecting) {
                            var r = e.target.children;
                            for (let t = 0; t < r.length; t++) {
                                let e = r[t];
                                var a = e.getAttribute("bv-data-srcset"),
                                    o = e.getAttribute("bv-data-src");
                                a && e.setAttribute("srcset", a), o && e.setAttribute("src", o)
                            }
                            g.unobserve(e.target)
                        }
                    })
                });
                let r = document.querySelectorAll(".bv-lazyload-picture");
                r.forEach(e => {
                    g.observe(e)
                })
            } else {
                a.forEach(e => {
                    let t = atob(e.declaration);
                    e = atob(e.selector);
                    let r = document.querySelectorAll(e);
                    r.forEach(e => {
                        e.style = t
                    })
                });
                let e = document.querySelectorAll(".bv-lazyload-bg-style");
                e.forEach(e => {
                    var t = e.getAttribute("bv-data-style");
                    console.log(t), t ? e.setAttribute("style", t) : console.log("BV_STYLE_ATTRIBUTE_NOT_FOUND: " + entry)
                });
                document.querySelectorAll(".bv-lazyload-tag-img");
                e.forEach(e => {
                    var t = e.getAttribute("bv-data-src"),
                        r = e.getAttribute("bv-data-srcset");
                    r && e.setAttribute("srcset", r), t && e.setAttribute("src", t), t || r || console.log("IMAGE_URL_NOT_FOUND : " + e)
                })
            }
        }
    </script>

    <meta charset="UTF-8">
    <meta name='robots' content='noindex, nofollow' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require_once 'function/title_script.php';?>
    <title>Moalym - </title>
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="9th subject - Moalym" />
    <meta property="og:description" content="Add Your Heading Text Here 9th Class English Chapters Chapter Name  01 Chapter Name  02 Chapter Name  03 Chapter Name  04 Chapter Name  05 Chapter Name  06 Chapter Name  07 Chapter Name  08 Chapter Name  09 Chapter Name  10"
    />
    <meta property="og:url" content="https://moalym.com/9th-subject/" />
    <meta property="og:site_name" content="Moalym" />
    <meta property="article:modified_time" content="2023-09-30T17:13:48+00:00" />
    <meta name="twitter:card" content="summary_large_image" />
    <script type="application/ld+json" class="yoast-schema-graph">
        {
            "@context": "https://schema.org",
            "@graph": [{
                "@type": "WebPage",
                "@id": "https://moalym.com/9th-subject/",
                "url": "https://moalym.com/9th-subject/",
                "name": "9th subject - Moalym",
                "isPartOf": {
                    "@id": "https://moalym.com/#website"
                },
                "datePublished": "2023-09-16T11:22:12+00:00",
                "dateModified": "2023-09-30T17:13:48+00:00",
                "breadcrumb": {
                    "@id": "https://moalym.com/9th-subject/#breadcrumb"
                },
                "inLanguage": "en-US",
                "potentialAction": [{
                    "@type": "ReadAction",
                    "target": ["https://moalym.com/9th-subject/"]
                }]
            }, {
                "@type": "BreadcrumbList",
                "@id": "https://moalym.com/9th-subject/#breadcrumb",
                "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "name": "Home",
                    "item": "https://moalym.com/"
                }, {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "9th subject"
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
    <style id='wp-emoji-styles-inline-css'>
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <link rel='stylesheet' id='wp-block-library-css' href='https://moalym.com/wp-includes/css/dist/block-library/style.min.css?ver=6.4.1' media='all' />
    <style id='classic-theme-styles-inline-css'>
        /*! This file is auto-generated */
        
        .wp-block-button__link {
            color: #fff;
            background-color: #32373c;
            border-radius: 9999px;
            box-shadow: none;
            text-decoration: none;
            padding: calc(.667em + 2px) calc(1.333em + 2px);
            font-size: 1.125em
        }
        
        .wp-block-file__button {
            background: #32373c;
            color: #fff;
            text-decoration: none
        }
    </style>

    <link rel='stylesheet' id='quiz-maker-css' href='https://moalym.com/wp-content/plugins/quiz-maker/public/css/quiz-maker-public.css?ver=6.4.9.9' media='all' />
    <link rel='stylesheet' id='eae-css-css' href='https://moalym.com/wp-content/plugins/addon-elements-for-elementor-page-builder/assets/css/eae.min.css?ver=1.12.9' media='all' />
    <link rel='stylesheet' id='font-awesome-4-shim-css' href='https://moalym.com/wp-content/plugins/elementor/assets/lib/font-awesome/css/v4-shims.min.css?ver=1.0' media='all' />
    <link rel='stylesheet' id='font-awesome-5-all-css' href='https://moalym.com/wp-content/plugins/elementor/assets/lib/font-awesome/css/all.min.css?ver=1.0' media='all' />
    <link rel='stylesheet' id='vegas-css-css' href='https://moalym.com/wp-content/plugins/addon-elements-for-elementor-page-builder/assets/lib/vegas/vegas.min.css?ver=2.4.0' media='all' />
    <link rel='stylesheet' id='hfe-style-css' href='https://moalym.com/wp-content/plugins/header-footer-elementor/assets/css/header-footer-elementor.css?ver=1.6.20' media='all' />
    <link rel='stylesheet' id='elementor-icons-css' href='https://moalym.com/wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min.css?ver=5.23.0' media='all' />
    <link rel='stylesheet' id='elementor-frontend-css' href='https://moalym.com/wp-content/plugins/elementor/assets/css/frontend-lite.min.css?ver=3.17.3' media='all' />
    <link rel='stylesheet' id='swiper-css' href='https://moalym.com/wp-content/plugins/elementor/assets/lib/swiper/v8/css/swiper.min.css?ver=8.4.5' media='all' />
    <link rel='stylesheet' id='elementor-post-5-css' href='https://moalym.com/wp-content/uploads/elementor/css/post-5.css?ver=1699486797' media='all' />
    <link rel='stylesheet' id='elementor-pro-css' href='https://moalym.com/wp-content/plugins/pro-elements/assets/css/frontend-lite.min.css?ver=3.16.2' media='all' />
    <link rel='stylesheet' id='elementor-global-css' href='https://moalym.com/wp-content/uploads/elementor/css/global.css?ver=1699486799' media='all' />
    <link rel='stylesheet' id='elementor-post-1293-css' href='https://moalym.com/wp-content/uploads/elementor/css/post-1293.css?ver=1699529442' media='all' />
    <link rel='stylesheet' id='quiz-maker-admin-css' href='https://moalym.com/wp-content/plugins/quiz-maker/admin/css/admin.css?ver=6.4.9.9' media='all' />
    <link rel='stylesheet' id='hfe-widgets-style-css' href='https://moalym.com/wp-content/plugins/header-footer-elementor/inc/widgets-css/frontend.css?ver=1.6.20' media='all' />
    <link rel='stylesheet' id='elementor-post-717-css' href='https://moalym.com/wp-content/uploads/elementor/css/post-717.css?ver=1699486799' media='all' />
    <link rel='stylesheet' id='elementor-post-1202-css' href='https://moalym.com/wp-content/uploads/elementor/css/post-1202.css?ver=1699486799' media='all' />
    <link rel='stylesheet' id='generate-style-css' href='https://moalym.com/wp-content/themes/generatepress/assets/css/main.min.css?ver=3.3.1' media='all' />

    <link rel='stylesheet' id='elementor-icons-ekiticons-css' href='https://moalym.com/wp-content/plugins/elementskit-lite/modules/elementskit-icon-pack/assets/css/ekiticons.css?ver=3.0.3' media='all' />
    <link rel='stylesheet' id='ekit-widget-styles-css' href='https://moalym.com/wp-content/plugins/elementskit-lite/widgets/init/assets/css/widget-styles.css?ver=3.0.3' media='all' />
    <link rel='stylesheet' id='ekit-responsive-css' href='https://moalym.com/wp-content/plugins/elementskit-lite/widgets/init/assets/css/responsive.css?ver=3.0.3' media='all' />
    <link rel='stylesheet' id='eael-general-css' href='https://moalym.com/wp-content/plugins/essential-addons-for-elementor-lite/assets/front-end/css/view/general.min.css?ver=5.9' media='all' />
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
    <link rel="alternate" type="application/json" href="https://moalym.com/wp-json/wp/v2/pages/1293" />
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://moalym.com/xmlrpc.php?rsd" />
    <meta name="generator" content="WordPress 6.4.1" />
    <link rel='shortlink' href='https://moalym.com/?p=1293' />
    <link rel="alternate" type="application/json+oembed" href="https://moalym.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fmoalym.com%2F9th-subject%2F" />
    <link rel="alternate" type="text/xml+oembed" href="https://moalym.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fmoalym.com%2F9th-subject%2F&#038;format=xml" />
    <meta name="generator" content="Elementor 3.17.3; features: e_dom_optimization, e_optimized_assets_loading, e_optimized_css_loading, additional_custom_breakpoints; settings: css_print_method-external, google_font-enabled, font_display-swap">
    <link rel="stylesheet" href="web_asset/css/style.css">
    <style id="wp-custom-css">
        .wp-block-image img {
            box-sizing: border-box;
            height: auto;
            max-width: 100%;
            vertical-align: bottom;
            border-radius: 10px;
        }
    </style>
</head>

<body class="page-template page-template-elementor_header_footer page page-id-1474 wp-embed-responsive ehf-header ehf-footer ehf-template-generatepress ehf-stylesheet-generatepress right-sidebar nav-below-header separate-containers header-aligned-left dropdown-hover elementor-default elementor-template-full-width elementor-kit-5 elementor-page elementor-page-1474 full-width-content"
    itemtype="https://schema.org/WebPage" itemscope>