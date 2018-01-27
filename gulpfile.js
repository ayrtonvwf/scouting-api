'use strict';

require('dotenv').config(); // loads .env file

const gulp = require('gulp');
const watch = require('gulp-watch');
const apidoc = require('gulp-api-doc');

const dev = './development';
const api_doc_path = './docs/api';
const server = process.env.SERVER_PATH;

gulp.task('copy', function() {
    return copy();
});

gulp.task('doc', function() {
    return doc();
});

gulp.task('watch', function(done) {
    watch(dev+'/**/*', function() {
        copy();
        doc();
    });
});

function copy() {
    return gulp.src([dev+'/**/*', dev+'/**/.*'])
        .pipe(gulp.dest(server));
}

function doc() {
    return gulp.src(dev)
        .pipe(apidoc())
        .pipe(gulp.dest(api_doc_path));
}