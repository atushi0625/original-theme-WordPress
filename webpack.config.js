module.exports = {
     mode: process.env.NODE_ENV,
     //基本はmain.jsが入る
     entry: "./src/js/theme-common.js",
     output: {
          filename: "bundle.js"
     },
     module: {
          rules: [{
               test: /\.js$/,
               use: [{
                    loader: "babel-loader",
                    options: {
                         presets: [
                              "@babel/preset-env",
                         ],
                    },
               }, ],
          }, ],
     },
     target: ["web", "es5"],

}