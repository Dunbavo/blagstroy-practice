'use strict';

const HOST = process.env.HOST || 'http://127.0.0.1';
const webpack = require('webpack');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const entry = require('./entry');

process.env.NODE_ENV = 'development';

module.exports = {
  mode: 'development',
  entry: entry,
  output: {
    filename: 'dev/[name]/[name].js',
    path: __dirname + '/local/assets/',
    publicPath: '/local/assets/',
    clean: {
      keep: /^(?!mustache|local).+/,
    },
  },
  devtool: "inline-cheap-module-source-map",
  plugins: [
    new BrowserSyncPlugin(
      {
        host: 'localhost',
        port: 3000,
        proxy: 'http://localhost:3100',
        startPath: '/index.php',
        ignore: ['bitrix', 'vendor'],
        open: true,
        files: [
          {
            match: [
              '**/*.php'
            ],
            options: {
              ignored: [
                'bitrix/**/*',
                'node_modules/**/*',
                'vendor/**/*'
              ]
            }
          }
        ]

      },
      {
        reload: false
      }
    ),
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
              ['@babel/preset-env', { targets: "defaults" }]
            ],
          },
        }
      },
      {
        test: /\.(sa|sc)ss$/,
        use: [
          'style-loader',
          'css-loader',
          'postcss-loader',
          'resolve-url-loader',
          {
            loader: "sass-loader",
            options: {
              api: 'modern',
              sourceMap: true,
              sassOptions: {
                syntax: 'indented'
              }
            },
          },
        ],
      },
      {
        test: /\.css$/,
        use: [
          'style-loader',
          'css-loader',
          'postcss-loader',
        ],
      },
      {
        test: /\.eot(\?v=\d+\.\d+\.\d+)?$/,
        type: 'asset/resource',
        generator: {
          filename: 'dev/fonts/[name][ext]',
        }
      },
      {
        test: /\.(woff|woff2)$/,
        type: "asset/resource",
        generator: {
          filename: "dev/fonts/[name][ext]",
        }
      },
      {
        test: /\.ttf(\?v=\d+\.\d+\.\d+)?$/,
        type: "asset/resource",
        generator: {
          filename: "dev/fonts/[name][ext]",
          mimetype: "application/octet-stream"
        }
      },
      {
        test: /\.svg(\?v=\d+\.\d+\.\d+)?$/,
        type: "asset/resource",
        generator: {
          filename: "dev/fonts/[name][ext]",
          mimetype: "image/svg+xml"
        }
      },
      {
        test: /\.gif/,
        exclude: /(node_modules|bower_components)/,
        type: "asset/resource",
        generator: {
          filename: "dev/fonts/[name][ext]",
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
          filename: "dev/fonts/[name].[ext]",
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
    runtimeChunk: {
      name: 'bundle-runtime'
    }
  },
  devServer: {
    hot: true,
    port: 3100,
    open: false,
    host: "localhost",
    devMiddleware: {
      writeToDisk: (filePath) => {
        return /\.mustache$/.test(filePath);
      },
    },
    proxy: {
      "**/*": {
        target: HOST, // target host
        secure: false,
        changeOrigin: true
      }
    }
  },
};
