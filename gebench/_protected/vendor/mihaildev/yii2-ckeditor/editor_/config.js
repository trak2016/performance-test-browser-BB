/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.extraPlugins = 'syntaxhighlight';
	config.syntaxhighlightLangDefault = 'php'
};

# WYSIWYG toolbars (advanced, basic or [custom config])
define('GSEDITORTOOL', 'advanced');

define('GSEDITORTOOL',"['Source','Cut','Copy','Paste','PasteText','PasteFromWord','Undo','Redo','Find','Replace','SelectAll','RemoveFormat'],
	'/',
	['Bold','Italic','Underline','Strike','Subscript','Superscript','JustifyLeft','JustifyCenter','JustifyRight','JustifyFull'],
	['TextColor','BGColor','Rule','PageBreak'],['NumberedList','BulletedList','Outdent','Indent'],
	'/',
	['Blockquote','Smiley'],['Link','Unlink','Anchor'],
	['Image','Flash','video','fileicon','Table','HorizontalRule','SpecialChar'],
	       	'/',
	['Styles','Format','Font','FontSize'],['ShowBlocks'],['syntaxhighlight'],['Templates']
	");