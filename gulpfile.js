'use strict';

require('dotenv').config(); // loads .env file

const gulp = require('gulp');
const watch = require('gulp-watch');

const dev = './development';
const server = process.env.SERVER_PATH;

gulp.task('copy', function() {
    gulp.src([dev+'/**/*', dev+'/**/.*'])
        .pipe(gulp.dest(server));
});

gulp.task('watch', function() {
    watch(dev+'/**/*', {path: dev})
        .pipe(gulp.dest(server));
});