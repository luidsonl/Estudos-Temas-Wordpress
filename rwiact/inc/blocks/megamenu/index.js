const registerBlockType = wp.blocks.registerBlockType;
const createElement = wp.element.createElement;

registerBlockType("rwiakt/megamenu", {
    title: "MegaMenu",
    category: "widgets",
    edit: function(){
        return createElement('h1', null, 'Edit');
    },
    save: function(){
        return createElement('h1', null, 'Save');
    },
});
