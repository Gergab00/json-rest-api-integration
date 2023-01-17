const { promises: fs } = require("fs")
const path = require("path")

// Copy all Bootstrap SCSS files.
async function copyDir(src, dest) {
    await fs.mkdir(dest, { recursive: true });
    let entries = await fs.readdir(src, { withFileTypes: true });

    for (let entry of entries) {
        let srcPath = path.join(src, entry.name);
        let destPath = path.join(dest, entry.name);

        if(entry.isDirectory()) {
            await copyDir(srcPath, destPath);
        } else if(!entry.name.endsWith('.min')) {
            await fs.copyFile(srcPath, destPath);
        }
    }
}

// Copy all Bootstrap SCSS files.
copyDir('./node_modules/bootstrap/scss', './src/assets/sass/bootstrap');
// Copy all DataTables CSS files.
copyDir('./node_modules/datatables.net-dt/css', './css');

copyDir('./node_modules/datatables.net-dt/js', './js');