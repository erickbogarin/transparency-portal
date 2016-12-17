var path = require('path');
var webpack = require('webpack');
var ExtractTextPlugin = require("extract-text-webpack-plugin");

module.exports = {
    entry: {        
        style: "./public/css",
        script: "./public/js"
    },
    output: {
        path: path.join(__dirname, "public/dist"),
        filename: "[name].js"
    },
    module: {
        loaders: [
            {
                test: /\.css$/,
                loader: ExtractTextPlugin.extract("style-loader", "css-loader"),
            }
        ]
    },
    plugins: [
        new webpack.optimize.UglifyJsPlugin({
            sourceMap: false,
            mangle: false
        }),
        new ExtractTextPlugin("[name].css")
    ],
    devServer: {
        inline: true,
        contentBase: './public/views',
        port: 3333
    }
};