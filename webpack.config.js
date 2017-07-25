const path = require('path');
const webpack = require('webpack');
const ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = {
  entry: './dev/scripts/app.es6',
  output: {
    path: path.join(__dirname, './', ''),
    filename: 'app.js'
  },
  module: {
    rules: [{
        test: /\.js$/,
        use: 'babel-loader',
        exclude: /node_modules/
      },
      {
        test: /\.css$/,
        use: ['style-loader', 'css-loader']
      },
      {
        test: /\.scss$/,
        use: ExtractTextPlugin.extract({
          fallback: 'style-loader',
          use: ['css-loader', 'sass-loader?sourceMap']
        })
      },
      {
        test: /\.html$/,
        use: 'raw-loader'
      },
      // inline base64 URLs for <=8k images, direct URLs for the rest
      {
        test: /\.(png|jpg)$/,
        use: 'url-loader?limit=8192'
      },
      // helps to load bootstrap's css.
      {
        test: /\.woff(\?v=\d+\.\d+\.\d+)?$/,
        use: 'url-loader?limit=10000&minetype=application/font-woff'
      },
      {
        test: /\.woff2$/,
        use: 'url-loader?limit=10000&minetype=application/font-woff'
      },
      {
        test: /\.ttf(\?v=\d+\.\d+\.\d+)?$/,
        use: 'url-loader?limit=10000&minetype=application/octet-stream'
      },
      {
        test: /\.eot(\?v=\d+\.\d+\.\d+)?$/,
        use: 'file-loader'
      },
      {
        test: /\.svg(\?v=\d+\.\d+\.\d+)?$/,
        use: 'url-loader?limit=10000&minetype=image/svg+xml'
      }
    ]
  },
  plugins: [
    new ExtractTextPlugin({
      filename: './style.css'
    })
  ],
  resolve: {
    extensions: ['.js', '.json', '.scss']
  },
  devtool: 'eval-source-map'
};