'use strict';

const HOST = process.env.HOST || 'http://127.0.0.1'
const webpack = require('webpack')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const TerserPlugin = require("terser-webpack-plugin")
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin')
const AssetsPlugin = require('assets-webpack-plugin')
const entry = require('./entry')

process.env.NODE_ENV = 'production';

module.exports = {
  mode: 'production',
  entry: entry,
  output: {
    filename: 'local/[name]/[name].[contenthash].js',
    path: __dirname + '/local/assets/',
    publicPath: '/local/assets/',
    clean: {
      keep: /^(?!mustache|local).+/
    },
  },
  devtool: false,
  plugins: [
    new AssetsPlugin({filename: 'assets.json'}),
    new MiniCssExtractPlugin({
      filename: "local/[name]/[name].[contenthash].css",
      chunkFilename: "[id].[contenthash].css"
    }),
    new CssMinimizerPlugin({
      parallel: 4,
      minify: CssMinimizerPlugin.cssnanoMinify
    })
  ],
  module: {
    rules: [
      {
        test: /\.(js|jsx)$/,
        exclude: /(node_modules|bower_components|build\/)/,
        use: {
          loader: "babel-loader",
          options: {
            presets: [
              ['@babel/preset-env', {targets: "defaults"}]
            ],
          },
        }
      },
      {
        test: /\.(sa|sc)ss$/,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'postcss-loader',
          'resolve-url-loader',
          {
            loader: "sass-loader",
            options: {
              api: 'modern',
              sourceMap: true,
              sassOptions: {
                silenceDeprecations: ['legacy-js-api', 'import', 'global-builtin', 'color-functions'],
                syntax: 'indented'
              }
            },
          },
        ],
      },
      {
        test: /\.css$/,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'postcss-loader',
        ],
      },
      {
        test: /\.eot(\?v=\d+\.\d+\.\d+)?$/,
        type: 'asset/resource',
        generator: {
          filename: 'local/fonts/[name][ext]',
        }
      },
      {
        test: /\.(woff|woff2)$/,
        type: "asset/resource",
        generator: {
          filename: "local/fonts/[name][ext]",
        }
      },
      {
        test: /\.ttf(\?v=\d+\.\d+\.\d+)?$/,
        type: "asset/resource",
        generator: {
          filename: "local/fonts/[name][ext]",
          mimetype: "application/octet-stream"
        }
      },
      {
        test: /\.svg(\?v=\d+\.\d+\.\d+)?$/,
        type: "asset/resource",
        generator: {
          filename: "local/fonts/[name][ext]",
          mimetype: "image/svg+xml"
        }
      },
      {
        test: /\.gif/,
        exclude: /(node_modules|bower_components)/,
        type: "asset/resource",
        generator: {
          filename: "local/fonts/[name][ext]",
          mimetype: "image/gif"
        }
      },
      {
        test: /\.jpg/,
        exclude: /(node_modules|bower_components)/,
        type: "asset/resource"
      },
      {
        test: /\.png/,
        exclude: /(node_modules|bower_components)/,
        type: "asset/resource",
        generator: {
          filename: "local/fonts/[name].[ext]",
          mimetype: "image/png"
        }
      },
      {
        test: /\.mustache$/,
        type: 'asset/resource',
        generator: {
          filename: '[name].mustache?[contenthash]',
          outputPath: 'mustache/'
        }
      }
    ]
  },
  resolve: {
    modules: ['node_modules', 'blocks', 'local/assets/vendor'],
    extensions: ['.*', '.js']
  },
  resolveLoader: {
    modules: ['node_modules'],
    extensions: ['*', '.js']
  },
  optimization: {
    minimizer: [
      new TerserPlugin({
        parallel: 4,
      })
    ]
  }
};
