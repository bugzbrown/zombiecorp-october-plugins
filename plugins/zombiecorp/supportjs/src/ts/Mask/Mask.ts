class Masks{
    protected zcAttribute: string;
    public constructor(public attributeName="zc-mask"){
        this.zcAttribute = attributeName;
        this.initialize();
    }

    private initialize(){
        let maskedItems = document.querySelectorAll('[' + this.zcAttribute + ']')
        console.log(this.zcAttribute )
        console.log(maskedItems)
        for (let i=0; i<maskedItems.length;i++){
            let $input =maskedItems[i];
            console.log($input)
            let field = false;
            let maskFunc = $input.attributes[this.zcAttribute].value;
            if (this[maskFunc]!== undefined){
                let _this = this;
                $input.addEventListener('input', (e:any) => {
                    e.target.value = _this[maskFunc](e.target.value)
                }, false)
            }
        }
    }
    /**
     * Format the input field for a local ZIPcode
     * @param value string Field Value
     */
    private cep( value:string ) {
		return value
			.replace(/\D/g,'')
			.replace(/(\d{5})(\d)/,'$1-$2')
			.replace(/(-\d{3})\d+?$/,'$1')
    }

	private telefone (value:string) {
		return value
			.replace(/\D/g,'')
			.replace(/(\d{2})(\d)/,'($1) $2')
			.replace(/(\d{4})(\d)/,'$1-$2')
			.replace(/(\d{4})-(\d)(\d{4})/,'$1$2-$3')
			.replace(/(-\d{4})\d+?$/,'$1')
    }

	private telefonefixo (value:string) {
		return value
			.replace(/\D/g,'')
			.replace(/(\d{2})(\d)/,'($1) $2')
			.replace(/(\d{4})(\d)/,'$1-$2')
			.replace(/(-\d{4})\d+?$/,'$1')
    }

    private cnpj (value:string) {
        return value
            .replace(/\D/g,'')
            .replace(/(\d{2})(\d)/,'$1.$2')
            .replace(/(\d{3})(\d)/,'$1.$2')
            .replace(/(\d{3})(\d)/,'$1/$2')
            .replace(/(\d{4})(\d)/,'$1-$2')
            .replace(/(-\d{2})\d+?$/,'$1')
    }

    private cpf (value:string) {
		return value
			.replace(/\D/g,'')
			.replace(/(\d{3})(\d)/,'$1.$2')
			.replace(/(\d{3})(\d)/,'$1.$2')
			.replace(/(\d{3})(\d{1,2})/,'$1-$2')
			.replace(/(-\d{2})\d+?$/,'$1')
    }

}

export { Masks }