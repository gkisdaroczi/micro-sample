$('.navbar .nav').nav({
    btn: '.nav-btn'
});

(function () {
    var all = document.querySelectorAll('.animation-trigger');

    all.forEach(function (trigger) {
        var animated = trigger.querySelectorAll('.animate');

        animated.forEach(function (element, i) {
            element.animate = new Animate(element, {
                animation: 'fadeInUp',
                initial: function () {
                    element.classList.add('hidden');
                }
            });

            new Waypoint({
                element: trigger,
                handler: function () {
                    setTimeout(function () {
                        element.animate.animateOnce({
                            preProcess: function () {
                                element.classList.remove('hidden');
                            }
                        });
                    }, i * 100);
                },
                offset: '75%'
            });
        });
    });
})();
