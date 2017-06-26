/*========================================================================
 * Neo Crowdfunding Shortcode Button
 *======================================================================== */
(function() {
	tinymce.PluginManager.add('crowdfunding_button', function( editor, url ) {
		editor.addButton( 'crowdfunding_button', {
			text: 'Shortcode',
			icon: false,
			type: 'menubutton',
			menu: [
				{
					text: 'Registration Shortcode',
					onclick: function() {
						editor.insertContent('[wpneo_registration]');
					}
				},{
					text: 'Dashboard Shortcode',
					onclick: function() {
						editor.insertContent('[wpneo_crowdfunding_dashboard]');
					}
				},{
					text: 'Search Shortcode',
					onclick: function() {
						editor.insertContent('[wpneo_search_shortcode]');
					}
				},{
					text: 'Form Shortcode',
					onclick: function() {
						editor.insertContent('[wpneo_crowdfunding_form]');
					}
				},{
					text: 'Listing Shortcode',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Campaign Listing Shortcode',
							body: [
								{
									type: 'textbox',
									name: 'number',
									label: 'number',
									value: '-1'
								},
								{
									type: 'textbox',
									name: 'cat',
									label: 'Category Slug',
									value: '',
								}
							],
							onsubmit: function( e ) {
								editor.insertContent( '[wpneo_crowdfunding_listing number="' + e.data.number + '" cat="' + e.data.cat + '" ]');
							}
						});
					}
				}
			]
		});
	});
})();




