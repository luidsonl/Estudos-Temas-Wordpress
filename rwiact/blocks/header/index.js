var registerBlockType = wp.blocks.registerBlockType;

registerBlockType("rwiakt/header",{
    edit: function(){
        return 'Edit';
    },
    save: function(){
        return 'Save';
    },
});