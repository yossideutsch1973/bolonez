<!DOCTYPE html>
<html lang="en">
<head>
<title>ACE in Action</title>
<style type="text/css" media="screen">
    #editor { 
        position: absolute;
        top: 0%;
        right: 50%;
        bottom: 0%;
        left: 0;
    }
    #preview { 
        position: absolute;
        top: 0%;
        right: 0;
        bottom: 0%;
        left: 50%;
    }
</style>
</head>
<body onload="start_editor()">

<div id="editor">
    digraph{a -> b -> c}
</div>
<div id="preview">
    <p>Preview</p>
    <svg id="svg"></svg>
</div>
    
<script src="https://pagecdn.io/lib/ace/1.4.14/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="node_modules/viz.js/viz.js"></script>
<script src="node_modules/viz.js/full.render.js"></script>
<script>
    //import Viz from "viz.js";

    function start_editor(){
        var editor = ace.edit("editor");
        editor.setTheme("ace/theme/monokai");
        editor.session.setMode("ace/mode/dot");
        editor.session.on('change', function(delta) {
            // delta.start, delta.end, delta.lines, delta.action
            preview_update(editor)
        });

        preview_update(editor)
        
    }

    function preview_update(editor, viz){
        var viz = new Viz()
        //document.getElementById("preview").innerHTML = '<p>' + editor.getValue() + '</p>' 
        viz.renderSVGElement(editor.getValue())
            .then(function(element) {
                //document.body.appendChild(element);
                //document.getElementById("preview").append(element)
                const prev = document.getElementById("svg")
                element.id = prev.id
                prev.parentNode.replaceChild(element, prev)
    });

    }
     
</script>
</body>
</html>

