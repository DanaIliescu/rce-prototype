var debug = process.env.NODE_ENV !== "production";
var webpack = require('webpack');
var ExtractTextPlugin = require('extract-text-webpack-plugin');
var CopyWebpackPlugin = require('copy-webpack-plugin');

module.exports = {
  context: __dirname,
  devtool: debug ? "inline-sourcemap" : false,
  entry: [
    "./src/js/scripts.js",
    "./src/scss/style.scss"
  ],
  output: {
    path: __dirname + "/wp-content/themes/rce/assets/js",
    filename: "scripts.min.js"
  },
  module: {
    rules: [{
      test: /\.(scss)$/,
      loader: ExtractTextPlugin.extract({
		  use: [
			{
				loader: 'css-loader',
				options: {
					url: false,
					minimize: !debug
				}
			},
			{
				loader:  'sass-loader'
			}
		  ]}
	  )
    }
  ]
  },
  plugins: debug ? [
    new ExtractTextPlugin({
      filename: "../css/style.min.css"
    }),
    new CopyWebpackPlugin(
		[
			{ from: './src/images', to: __dirname + "/wp-content/themes/rce/assets/images/" },
		]
    )
  ] : [
    new ExtractTextPlugin({
      filename: "../css/style.min.css"
    }),
    //new webpack.optimize.UglifyJsPlugin(),
    new CopyWebpackPlugin(
		[
        	{ from: './src/images', to: __dirname + "/wp-content/themes/rce/assets/images/" },
		]
    ),
  ],
  externals: {
    // require("jquery") is external and available
    //  on the global var jQuery
    "jquery": "jQuery"
  }
};
