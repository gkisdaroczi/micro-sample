'use strict'

var Animate = function (element, params) {
    if (!element) {
        return false;
    }

    var self = this;

    self.done = false;
    self.element = element;
    self.options = {
        animation: 'fadeIn'
    };

    self.options = Object.assign(self.options, params);

    if (self.options.initial) {
        self.options.initial();
    }

    return self;
}

Animate.prototype.animateOnce = function (params) {
    var self = this;

    if (self.done) {
        return self;
    }

    self.animate(params);
    self.done = true;

    return self;
}

Animate.prototype.animate = function (params) {
    var self = this;
    var options = {};

    options = Object.assign(options, self.options);

    if (params) {
        options = Object.assign(options, params);
    }

    if (options.preProcess) {
        options.preProcess();
    }

    self.element.classList.add('animated', options.animation);

    self.prevOptions = options;

    self.timer = setTimeout(function () {
        self._finish();
    }, 1000);

    return self;
}

Animate.prototype.stop = function () {
    var self = this;

    clearTimeout(self.timer);

    if (self.prevOptions) {
        self._finish();
    }

    return self;
};

Animate.prototype._finish = function () {
    var self = this;
    var options = self.prevOptions;

    self.element.classList.remove('animated', options.animation);

    if (options.postProcess) {
        options.postProcess();
    }
}
