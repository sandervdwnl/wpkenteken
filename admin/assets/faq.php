<h3>Installation</h3>

<p>Download the latest release from the Github page https://github.com/sandervdwnl/wpkenteken-plugin. 1. In WordPress admin, choose 'Plugins' and then 'Add New'. 1. Upload the downloaded .zip-file. 1. Activate the plugin through the 'Plugins' menu in WordPress</p>

<h3>Frequently Asked Questions</h3>

<h4>Where can I get the API key?</h4>

<p>Navigate to the RDW Open Data API page https://dev.socrata.com/foundry/opendata.rdw.nl/qyrd-w56j and choose 'API'. There you can register for an API key. When you have received the API key, go to WordPress admin and choose 'Settings' and then 'WPKenteken'. There you can fill in the API key and your key will be saved in the database.</p>

<h4>How do I use the plugin?</h4>

<p>Build a form with at least a field for the license number and other field you like to have filled in automatically. For now the following fields with the fowllowing CSS classes are supported: * A field for the license number with CSS class 'wpkenteken-kenteken'; * A field for the car's brand with CSS class 'wpkenteken-merk'; * A field for the car's model with CSS class 'wpkenteken-model'; * A field for the car's production year with CSS class 'wpkenteken-bouwjaar'.</p>

<p>This plugin is tested with Contact Form 7, Ninja Forms and WP Forms. If possible, give the container of the field the CSS class. Otherwise give the field itself the CSS class.</p>

<p><strong>Important: fdr Ninja Forms you have to enable Dev Mode in Settings to add CSS classes.</strong></p>

<h4>The data is not retrieved. What causes this the problem?</h4>

<p>The plugin only supports Dutch license numbers. 1. Check of your input is valid and six characters long. 1. Check of your form contains the correct CSS classes, as described above. 1. Sometimes the API can be unreachable. Try again later.";</p>
