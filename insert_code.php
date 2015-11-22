<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>插入代码</title>
    <base target="_self"/>
	<style type='text/css'>
    body {
        font-family: sans-serif;
        font-size: 1.1em;
        background-color: #F1F1F1;
        color: #222;
    }
    .codeArea {
        margin: 10px auto;
        text-align: center;
    }
    textarea {
        margin-top: 10px;
        width: 100%;
        height: 300px;
    }
    </style>
</head>
<body id="link" >

<form name="wpgcp" action="#">
<div class="codeArea">
            <label for="lang">选择语言</label>
            <select id="wpgcp_lang" name="wpgcp_main" style="width: 200px">
					<option value="123" selected>不选择语言</option>
                    <option value="js" >javascript</option>
                    <option value="css">css</option>
                    <option value="html">html</option>
					<option value="php">php</option>
					<option value="sql">sql</option>
            </select>
            <textarea id="wpgcp_code" autofocus></textarea>
			<p><label for="wpgcp_linenumber">开始行</label><input type="text" name="linenumber" id="wpgcp_linenumber" value="1" size="3"/></p>
            <p><input type="submit" id="insert" name="insert" value="确定插入"
                           onclick="insertwpgcpcode();"/><input type="button" id="cancel" name="cancel" value="取消"
                           onclick="tinyMCEPopup.close();"/></p>
 </div>
   
</form>
<script>
    var html = window.parent.tinyMCE.activeEditor.selection.getContent();
    document.getElementById('wpgcp_code').value = html;

function escapeHtml(text) {
    return text.replace(/&/g, "&amp;").replace(/"/g, "&quot;").replace(/'/g, "'").replace(/</g, "&lt;").replace(/>/g, "&gt;");
}
function insertwpgcpcode() {

    var tagtext;
    var langname_ddb = document.getElementById('wpgcp_lang');
    var langname = langname_ddb.value;
    var linenumber = document.getElementById('wpgcp_linenumber').value;

    var html = escapeHtml(document.getElementById('wpgcp_code').value);

	if(langname_ddb=='123'){
		tagtext = '<pre class="prettyprint lang-'+ langname + ' linenums:' + linenumber + '" >' + html + '</pre>';
	}else{
		tagtext = '<pre>' + html + '</pre>';
	}
    window.parent.tinyMCE.activeEditor.execCommand('mceInsertContent', 0, tagtext); //获取内容并插入到编辑器
    window.parent.tinyMCE.activeEditor.windowManager.close(); //关闭对话框
    /*window.tinymce.activeEditor.insertContent(tagtext);
    tinyMCEPopup.editor.execCommand('mceRepaint');
    tinyMCEPopup.close();*/
    return;
}

</script>
</body>
</html>