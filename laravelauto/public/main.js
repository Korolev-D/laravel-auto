/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/
/******/
/******/ })()
;

function customDropDown(e) {
    const dropList = e.parentNode.querySelector('.custom-inner');
    const options = e.parentNode.querySelectorAll('.custom-inner .custom-option');
    const result = e.parentNode.querySelector('.select-result');

    dropList.style = "display: block"
    options.forEach(element => {
        element.addEventListener("click", element => {
            result.innerHTML = element.currentTarget.innerHTML;
            result.setAttribute('value', element.currentTarget.getAttribute('value'));
            dropList.style = "display: none"
        })
    });
}
