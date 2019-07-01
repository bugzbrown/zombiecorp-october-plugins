/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./ts/main.ts");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./ts/Mask/Mask.ts":
/*!*************************!*\
  !*** ./ts/Mask/Mask.ts ***!
  \*************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
eval("\nexports.__esModule = true;\nvar Masks = (function () {\n    function Masks(attributeName) {\n        if (attributeName === void 0) { attributeName = \"zc-mask\"; }\n        this.attributeName = attributeName;\n        this.zcAttribute = attributeName;\n        this.initialize();\n    }\n    Masks.prototype.initialize = function () {\n        var maskedItems = document.querySelectorAll('[' + this.zcAttribute + ']');\n        console.log(this.zcAttribute);\n        console.log(maskedItems);\n        var _loop_1 = function (i) {\n            var $input = maskedItems[i];\n            console.log($input);\n            var field = false;\n            var maskFunc = $input.attributes[this_1.zcAttribute].value;\n            if (this_1[maskFunc] !== undefined) {\n                var _this_1 = this_1;\n                $input.addEventListener('input', function (e) {\n                    e.target.value = _this_1[maskFunc](e.target.value);\n                }, false);\n            }\n        };\n        var this_1 = this;\n        for (var i = 0; i < maskedItems.length; i++) {\n            _loop_1(i);\n        }\n    };\n    Masks.prototype.cep = function (value) {\n        return value\n            .replace(/\\D/g, '')\n            .replace(/(\\d{5})(\\d)/, '$1-$2')\n            .replace(/(-\\d{3})\\d+?$/, '$1');\n    };\n    Masks.prototype.telefone = function (value) {\n        return value\n            .replace(/\\D/g, '')\n            .replace(/(\\d{2})(\\d)/, '($1) $2')\n            .replace(/(\\d{4})(\\d)/, '$1-$2')\n            .replace(/(\\d{4})-(\\d)(\\d{4})/, '$1$2-$3')\n            .replace(/(-\\d{4})\\d+?$/, '$1');\n    };\n    Masks.prototype.telefonefixo = function (value) {\n        return value\n            .replace(/\\D/g, '')\n            .replace(/(\\d{2})(\\d)/, '($1) $2')\n            .replace(/(\\d{4})(\\d)/, '$1-$2')\n            .replace(/(-\\d{4})\\d+?$/, '$1');\n    };\n    Masks.prototype.cnpj = function (value) {\n        return value\n            .replace(/\\D/g, '')\n            .replace(/(\\d{2})(\\d)/, '$1.$2')\n            .replace(/(\\d{3})(\\d)/, '$1.$2')\n            .replace(/(\\d{3})(\\d)/, '$1/$2')\n            .replace(/(\\d{4})(\\d)/, '$1-$2')\n            .replace(/(-\\d{2})\\d+?$/, '$1');\n    };\n    Masks.prototype.cpf = function (value) {\n        return value\n            .replace(/\\D/g, '')\n            .replace(/(\\d{3})(\\d)/, '$1.$2')\n            .replace(/(\\d{3})(\\d)/, '$1.$2')\n            .replace(/(\\d{3})(\\d{1,2})/, '$1-$2')\n            .replace(/(-\\d{2})\\d+?$/, '$1');\n    };\n    return Masks;\n}());\nexports.Masks = Masks;\n\n\n//# sourceURL=webpack:///./ts/Mask/Mask.ts?");

/***/ }),

/***/ "./ts/main.ts":
/*!********************!*\
  !*** ./ts/main.ts ***!
  \********************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
eval("\nexports.__esModule = true;\nvar Mask_1 = __webpack_require__(/*! ./Mask/Mask */ \"./ts/Mask/Mask.ts\");\ndocument.addEventListener(\"DOMContentLoaded\", function (event) {\n    var zcMasks = new Mask_1.Masks();\n});\n\n\n//# sourceURL=webpack:///./ts/main.ts?");

/***/ })

/******/ });