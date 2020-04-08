import { ChartInternal } from './core';

ChartInternal.prototype.categoryName = function (i) {
    // var config = this.config;
    // return i < config.axis_x_categories.length ? config.axis_x_categories[i] : i;
    var config = this.config, categoryIndex = Math.ceil(i);
    return i < config.axis_x_categories.length ? config.axis_x_categories[categoryIndex] : i;
};
