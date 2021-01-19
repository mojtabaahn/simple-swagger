window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.SwaggerUI = require('swagger-ui')
window.CodeMirror = require('codemirror')
require('codemirror/mode/yaml/yaml')
require('codemirror/addon/search/search')
require('codemirror/addon/search/jump-to-line')
require('codemirror/addon/search/match-highlighter')
require('codemirror/addon/search/searchcursor')
require('codemirror/addon/dialog/dialog')

// https://stackoverflow.com/a/1173319/5211299
window.selectText = function(element) {
    if (document.selection) { // IE
        var range = document.body.createTextRange();
        range.moveToElementText(element);
        range.select();
    } else if (window.getSelection) {
        var range = document.createRange();
        range.selectNode(element);
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);
    }
}
