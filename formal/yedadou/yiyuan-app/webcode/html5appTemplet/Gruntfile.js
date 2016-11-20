module.exports = function(grunt) {
  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    uglify: {
      options : {
                banner:'',
                sourceMap: true
      },
      buildboboweb: {
          files: [{
              expand:true,//expand参数为true来启用动态扩展，涉及到多个文件处理需要开启
              cwd:'../boboweb',//js目录下
              src:'**/*.js',//所有js文件
              dest: '../lib/boboweb'//输出到此目录下
          }]
      },
      buildApp: {
          files: [{
              expand:true,//expand参数为true来启用动态扩展，涉及到多个文件处理需要开启
              cwd:'src',//js目录下
              src:'**/*.js',//所有js文件
              dest: 'output'//输出到此目录下
          }]
      }
    },
    cssmin: {
      target: {
        files: [{
          expand: true,
          cwd: '../boboweb/ui',
          src: ['*.css', '!*.min.css'],
          dest: '../lib/boboweb/ui',
        }]
      }
    },
    copy: {
      main: {
        files: [
          {src:'../lib/**', dest: 'output/lib/'}
        ]
      },
      app: {
        files: [
          {expand: true,cwd: 'src',src:'**', dest: 'output/'}
        ]
      }
    },
    clean: {
      options:{ force: true },
      build: {
        src: ["../lib/boboweb", "output/**"]
      }
    },
    watch:{
       start:{
         files:['../boboweb/*.*','../boboweb/ui/*.*','src/**/**'],
         tasks:['clean','uglify:buildboboweb','cssmin','copy','copy:app','uglify:buildApp']
      }
    }
  });
  grunt.loadNpmTasks('grunt-contrib-copy'); //复制
  grunt.loadNpmTasks('grunt-contrib-clean'); //删除
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-watch'); //监控
  // 默认被执行的任务列表。 1.压缩boboweblib到lib ->复制lib到html5appTemplet/output里面  2.复制lib到html5appTemplet/src 压缩并放到output
  grunt.registerTask('default', ['clean','uglify:buildboboweb','cssmin','copy','copy:app','uglify:buildApp','watch']);
  //grunt.registerTask('default', ['clean']);
};


