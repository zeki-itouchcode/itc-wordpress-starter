import { readFile, access } from 'node:fs/promises';
const theme = new URL('../', import.meta.url);
JSON.parse(await readFile(new URL('theme.json', theme), 'utf8'));
for (const file of ['style.css', 'templates/index.html', 'templates/page.html', 'templates/single.html', 'parts/header.html', 'parts/footer.html']) {
  await access(new URL(file, theme));
}
console.log('Starter theme files and theme.json are valid.');
