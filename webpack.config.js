const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const webpack = require('webpack'); // Import webpack

module.exports = {
  entry: './src/js/main.js',
  output: {
    filename: 'bundle.js',
    path: path.resolve(__dirname, 'dist/js'),
  },
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'sass-loader',
        ],
      },
    ],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: '../css/styles.css', // Adjust the path to place it in the "css" directory
    }),
    new BrowserSyncPlugin({
      proxy: 'http://unik.local/',
      files: '**/*.php',
      reloadDelay: 0,
    }),
    new webpack.ProvidePlugin({
      unik_mah_js: 'unik_mah_js', // Add the global variable you want to provide
    }),
  ],
};
