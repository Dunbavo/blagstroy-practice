const fs = require('fs')
const path = require('path')

const filePath = '.env'
const mode = process.argv[2] === 'production' ? 'frontend-demonstration' : 'dev'
let envContent

if (!fs.existsSync(filePath)) {
	fs.writeFileSync(filePath, 'MODE="frontend-demonstration"')
}

if (fs.existsSync(filePath)) {
  envContent = fs.readFileSync(filePath, 'utf8')
}

const newValue = `MODE="${mode}"`;
const newEnvContent = envContent.replace(/MODE=".+"/, newValue);

fs.writeFileSync(filePath, newEnvContent);