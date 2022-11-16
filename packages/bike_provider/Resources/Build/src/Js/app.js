import '../scss/app.scss';

var cache = {};

//load all js modules
function importAll(r) {
    r.keys().forEach(key => cache[key] = r(key))
}

importAll(require.context('./', true, /\.js$/))
