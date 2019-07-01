var path = require("path");
var basePath = './';
module.exports = {
    entry: "./ts/main.ts",
    output: {
        path: path.resolve(__dirname, basePath + "../assets/js/"),
        filename: "support-bundle.js"
    },
    resolve: {
        extensions: [".tsx", ".ts", ".js", ".json"]
    },
    module: {
        rules: [
            // all files with a '.ts' or '.tsx' extension will be handled by 'ts-loader'
            { test: /\.tsx?$/, use: ["ts-loader"], exclude: /node_modules/ }
        ]
    }
}
