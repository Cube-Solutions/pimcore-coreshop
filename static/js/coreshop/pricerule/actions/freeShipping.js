/**
 * CoreShop
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.coreshop.org/license
 *
 * @copyright  Copyright (c) 2015 Dominik Pfaffenbauer (http://dominik.pfaffenbauer.at)
 * @license    http://www.coreshop.org/license     New BSD License
 */


pimcore.registerNS("pimcore.plugin.coreshop.pricerule.actions.freeShipping");
pimcore.plugin.coreshop.pricerule.actions.freeShipping = Class.create(pimcore.plugin.coreshop.pricerule.actions.abstract, {

    type : 'freeShipping',

    getForm : function() {

        this.form = new Ext.form.FormPanel({
            layout: "pimcoreform",
            type: 'FreeShipping',
            forceLayout: true
        });

        return this.form;
    }
});
