/**
 * @license Copyright (c) 2003-2022, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

// CKEDITOR.editorConfig = function( config ) {
// 	// Define changes to default configuration here. For example:
// 	config.language = 'en';
// 	// config.uiColor = '#AADC6E';
// };
/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function (config) {
    // Define changes to default configuration here. For example:
    // config.uiColor = '#AADC6E';

    // config.filebrowserImageUploadUrl = '/Home/UploadImage';

    config.contentsLangDirection = 'rtl';

    config.language = 'en';

    // config.extraPlugins = 'syntaxhighlight';
    config.extraPlugins = 'codesnippet';
    config.codeSnippet_theme = 'paraiso.dark';



    // config.toolbar = [
    //     { items: ['Templates', 'clipboard', 'Cut', 'Paste', 'Redo', 'Undo', 'Find', '-', 'basicstyles', 'cleanup', 'Link', 'Unlink', 'Anchor', 'syntaxhighlight', 'Image', 'Smiley', 'Flash', 'Table', 'SpecialChar', 'Syntaxhighlight', '-', 'Blockquote', 'Maximize', 'Preview'] },
    //     { items: ['Format', 'Font', 'FontSize', '-', 'Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript', '-', 'NumberedList', 'BulletedList', 'Indent', 'Outdent', '-', 'JustifyBlock', 'JustifyRight', 'JustifyCenter', 'JustifyLeft', 'BidiRtl', 'BidiLtr', 'TextColor', 'BGColor', 'Source'] }
    // ];
};
