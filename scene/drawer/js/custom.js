function init() {
    document.getElementById("username, password").value = "";
}
window.onload = init;

var area1, area2;
function toggleArea1() {
    if (!area1) {
        area1 = new nicEditor({fullPanel: true}).panelInstance('description', {hasPanel: true});
    } else {
        area1.removeInstance('description');
        area1 = null;
    }
}
bkLib.onDomLoaded(function() {
    toggleArea1();
});