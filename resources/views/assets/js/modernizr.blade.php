<?php $cd = null; ?>
@if(!empty($cd))
    <script>
        @endif
        /*!
 * modernizr v3.3.1
 * Build https://modernizr.com/download?-setclasses-dontmin
 *
 * Copyright (c)
 *  Faruk Ates
 *  Paul Irish
 *  Alex Sexton
 *  Ryan Seddon
 *  Patrick Kettner
 *  Stu Cox
 *  Richard Herrera

 * MIT License
 */

        /*
         * Modernizr tests which native CSS3 and HTML5 features are available in the
         * current UA and makes the results available to you in two ways: as properties on
         * a global `Modernizr` object, and as classes on the `<html>` element. This
         * information allows you to progressively enhance your pages with a granular level
         * of control over the experience.
        */

        ;(function (window, document, undefined) {
            var tests = [];


            /**
             *
             * ModernizrProto is the constructor for Modernizr
             *
             * @class
             * @access public
             */

            var ModernizrProto = {
                {{-- BORRAR // The current version, dummy--}}
                _version: '3.3.1',

                {{-- BORRAR // Any settings that don't work as separate modules--}}
                        {{-- BORRAR // can go in here as configuration.--}}
                _config: {
                    'classPrefix': '',
                    'enableClasses': true,
                    'enableJSClass': true,
                    'usePrefixes': true
                },

                {{-- BORRAR // Queue of tests--}}
                _q: [],

                {{-- BORRAR // Stub these for people who are listening--}}
                on: function (test, cb) {
                            {{-- BORRAR // I don't really think people should do this, but we can--}}
                            {{-- BORRAR // safe guard it a bit.--}}
                            {{-- BORRAR // -- NOTE:: this gets WAY overridden in src/addTest for actual async tests.--}}
                            {{-- BORRAR // This is in case people listen to synchronous tests. I would leave it out,--}}
                            {{-- BORRAR // but the code to *disallow* sync tests in the real version of this--}}
                            {{-- BORRAR // function is actually larger than this.--}}
                    var self = this;
                    setTimeout(function () {
                        cb(self[test]);
                    }, 0);
                },

                addTest: function (name, fn, options) {
                    tests.push({name: name, fn: fn, options: options});
                },

                addAsyncTest: function (fn) {
                    tests.push({name: null, fn: fn});
                }
            };


                    {{-- BORRAR // Fake some of Object.create so we can force non test results to be non "own" properties.--}}
            var Modernizr = function () {
                };
            Modernizr.prototype = ModernizrProto;

            {{-- BORRAR // Leak modernizr globally when you `require` it rather than force it here.--}}
                    {{-- BORRAR // Overwrite name so constructor name is nicer :D--}}
                Modernizr = new Modernizr();


            var classes = [];


            /**
             * is returns a boolean if the typeof an obj is exactly type.
             *
             * @access private
             * @function is
             * @param {*} obj - A thing we want to check the type of
             * @param {string} type - A string to compare the typeof against
             * @returns {boolean}
             */

            function is(obj, type) {
                return typeof obj === type;
            }
            ;

            /**
             * Run through all tests and detect their support in the current UA.
             *
             * @access private
             */

            function testRunner() {
                var featureNames;
                var feature;
                var aliasIdx;
                var result;
                var nameIdx;
                var featureName;
                var featureNameSplit;

                for (var featureIdx in tests) {
                    if (tests.hasOwnProperty(featureIdx)) {
                        featureNames = [];
                        feature = tests[featureIdx];
                        {{-- BORRAR // run the test, throw the return value into the Modernizr,--}}
                                {{-- BORRAR // then based on that boolean, define an appropriate className--}}
                                {{-- BORRAR // and push it into an array of classes we'll join later.--}}
                                {{-- BORRAR //--}}
                                {{-- BORRAR // If there is no name, it's an 'async' test that is run,--}}
                                {{-- BORRAR // but not directly added to the object. That should--}}
                                {{-- BORRAR // be done with a post-run addTest call.--}}
                        if (feature.name) {
                            featureNames.push(feature.name.toLowerCase());

                            if (feature.options && feature.options.aliases && feature.options.aliases.length) {
                                        {{-- BORRAR // Add all the aliases into the names list--}}
                                for (aliasIdx = 0; aliasIdx < feature.options.aliases.length; aliasIdx++) {
                                    featureNames.push(feature.options.aliases[aliasIdx].toLowerCase());
                                }
                            }
                        }

                        {{-- BORRAR // Run the test, or use the raw value if it's not a function--}}
                            result = is(feature.fn, 'function') ? feature.fn() : feature.fn;


                                {{-- BORRAR // Set each of the names on the Modernizr object--}}
                        for (nameIdx = 0; nameIdx < featureNames.length; nameIdx++) {
                            featureName = featureNames[nameIdx];
                            {{-- BORRAR // Support dot properties as sub tests. We don't do checking to make sure--}}
                                    {{-- BORRAR // that the implied parent tests have been added. You must call them in--}}
                                    {{-- BORRAR // order (either in the test, or make the parent test a dependency).--}}
                                    {{-- BORRAR //--}}
                                    {{-- BORRAR // Cap it to TWO to make the logic simple and because who needs that kind of subtesting--}}
                                    {{-- BORRAR // hashtag famous last words--}}
                                featureNameSplit = featureName.split('.');

                            if (featureNameSplit.length === 1) {
                                Modernizr[featureNameSplit[0]] = result;
                            } else {
                                {{-- BORRAR // cast to a Boolean, if not one already--}}
                                if (Modernizr[featureNameSplit[0]] && !(Modernizr[featureNameSplit[0]] instanceof Boolean)) {
                                    Modernizr[featureNameSplit[0]] = new Boolean(Modernizr[featureNameSplit[0]]);
                                }

                                Modernizr[featureNameSplit[0]][featureNameSplit[1]] = result;
                            }

                            classes.push((result ? '' : 'no-') + featureNameSplit.join('-'));
                        }
                    }
                }
            }
            ;

            /**
             * docElement is a convenience wrapper to grab the root element of the document
             *
             * @access private
             * @returns {HTMLElement|SVGElement} The root element of the document
             */

            var docElement = document.documentElement;


            /**
             * A convenience helper to check if the document we are running in is an SVG document
             *
             * @access private
             * @returns {boolean}
             */

            var isSVG = docElement.nodeName.toLowerCase() === 'svg';


            /**
             * setClasses takes an array of class names and adds them to the root element
             *
             * @access private
             * @function setClasses
             * @param {string[]} classes - Array of class names
             */

            {{-- BORRAR // Pass in an and array of class names, e.g.:--}}
            {{-- BORRAR //  ['no-webp', 'borderradius', ...]--}}
            function setClasses(classes) {
                var className = docElement.className;
                var classPrefix = Modernizr._config.classPrefix || '';

                if (isSVG) {
                    className = className.baseVal;
                }

                {{-- BORRAR // Change `no-js` to `js` (independently of the `enableClasses` option)--}}
                        {{-- BORRAR // Handle classPrefix on this too--}}
                if (Modernizr._config.enableJSClass) {
                    var reJS = new RegExp('(^|\\s)' + classPrefix + 'no-js(\\s|$)');
                    className = className.replace(reJS, '$1' + classPrefix + 'js$2');
                }

                if (Modernizr._config.enableClasses) {
                    {{-- BORRAR // Add the new classes--}}
                        className += ' ' + classPrefix + classes.join(' ' + classPrefix);
                    if (isSVG) {
                        docElement.className.baseVal = className;
                    } else {
                        docElement.className = className;
                    }
                }

            }

            ;

            {{-- BORRAR // Run each test--}}
            testRunner();

            {{-- BORRAR // Remove the "no-js" class if it exists--}}
            setClasses(classes);

            delete ModernizrProto.addTest;
            delete ModernizrProto.addAsyncTest;

                    {{-- BORRAR // Run the things that are supposed to run after the tests--}}
            for (var i = 0; i < Modernizr._q.length; i++) {
                Modernizr._q[i]();
            }

            {{-- BORRAR // Leak Modernizr namespace--}}
                window.Modernizr = Modernizr;


            ;

        })(window, document);
        @if(!empty($cd))
    </script>
@endif