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


pimcore.registerNS("pimcore.plugin.coreshop.pricerule.conditions.product");
pimcore.plugin.coreshop.pricerule.conditions.product = Class.create(pimcore.plugin.coreshop.pricerule.conditions.abstract, {

    type : 'product',

    getForm : function() {
        var product = {
            fieldLabel: t("coreshop_condition_product_product"),
            name: "product",
            cls: "input_drop_target",
            value: this.data.product,
            width: 300,
            xtype: "textfield",
            listeners: {
                "render": function (el) {
                    new Ext.dd.DropZone(el.getEl(), {
                        reference: this,
                        ddGroup: "element",
                        getTargetFromEvent: function(e) {
                            return this.getEl();
                        }.bind(el),

                        onNodeOver : function(target, dd, e, data) {
                            if (data.node.attributes.elementType == "object" && data.node.attributes.className == "CoreShopProduct") {
                                return Ext.dd.DropZone.prototype.dropAllowed;
                            }
                            return Ext.dd.DropZone.prototype.dropNotAllowed;
                        },

                        onNodeDrop : function (target, dd, e, data) {
                            if (data.node.attributes.elementType == "object" && data.node.attributes.className == "CoreShopProduct") {
                                this.setValue(data.node.attributes.path);
                                return true;
                            }
                            return false;
                        }.bind(el)
                    });
                }
            }
        };

        this.form = new Ext.form.FieldSet({
            items : [
                product
            ],
            border : 0
        });

        return this.form;
    }
});