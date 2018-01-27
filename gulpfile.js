'use strict';

require('dotenv').config(); // loads .env file

const gulp = require('gulp');
const watch = require('gulp-watch');
const apidoc = require('gulp-apidoc');

const dev = './development';
const api_doc_path = './docs/api';
const server = process.env.SERVER_PATH;

gulp.task('copy', function() {
    gulp.src([dev+'/**/*', dev+'/**/.*'])
        .pipe(gulp.dest(server));
});

gulp.task('watch', function(done) {
    watch(dev+'/**/*', {path: dev})
        .pipe(gulp.dest(server));
});

gulp.task('doc', function(done) {
    apidoc({
        src: dev,
        dest: api_doc_path
    }, done);
});