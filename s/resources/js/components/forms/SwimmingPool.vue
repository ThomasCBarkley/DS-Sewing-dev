<template>
    <div class="swimming-pool-container container mt-0 w-50">
        <div class="row">
            <div class="col-4">
                <h2> New Pool Cover </h2>
            </div>
            <div class="col-8" style="display: none">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="dwg1">
                    <label class="form-check-label" for="dwg1">
                        Dwg:⁭
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="dwg2">
                    <label class="form-check-label" for="dwg2">
                        copy old cover⁭
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="dwg3">
                    <label class="form-check-label" for="dwg3">
                        keep old cover⁭
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="dwg4">
                    <label class="form-check-label" for="dwg4">
                        throw cover⁭
                    </label>
                </div>
            </div>
        </div>
        <div class="row" style="display: none">
            <div class="col-3">
                <h4> Fabric: </h4>
            </div>
            <div class="col-9">
                <div class="form-check">
                    <input class="form-check-input mr-5" type="radio" name="fabric" id="fabric-mesh" value="1" checked>
                    <label class="form-check-label" for="fabric-mesh">
                        Mesh⁭
                    </label>
                    <div class="form-check form-check-inline" style="margin-left: 25px">
                        <input class="form-check-input" type="radio" name="mesh" id="mesh9-9" value="1">
                        <label class="form-check-label" for="mesh9-9">9x9⁭</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="mesh" id="mesh9-12" value="2">
                        <label class="form-check-label" for="mesh9-12">9x912</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="mesh" id="mesh18-18" value="3">
                        <label class="form-check-label" for="mesh18-18">18x18</label>
                    </div>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="fabric" id="fabric-solid" value="2">
                    <label class="form-check-label" for="fabric-solid">
                        Solid⁭
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="fabric" id="fabric-poly" value="3">
                    <label class="form-check-label" for="fabric-poly">
                        Polypropylene Mesh⁭
                    </label>
                </div>
            </div>
        </div>
        <div class="row" style="display: none">
            <div class="col-5">
                Color (Mesh & Solid only) <input-text size="15" v-model="fabricColor"></input-text>
            </div>
        </div>
        <div class="row mt-5">
            <h2>Estimate</h2>
        </div>
        <div class="row mt-2">
            <h4>Fabric</h4>
        </div>

        <table class="table">
            <tbody>
            <tr>
                <td>Length
                    <input-text v-model="fabricWidth"></input-text>
                    x
                    <input-text v-model="fabricLength"></input-text>
                    width =
                </td>
                <td>{{ formatPrice(fabricWidth * fabricLength) }}</td>
                <td>x {{ formatPrice(fabricM) }} =</td>
                <td>{{ formatPrice(fabricTotal) }}</td>
            </tr>
            <tr>
                <td>Webbing L
                    <input-text v-model="webbingLength"></input-text>
                    x
                    <input-text v-model="webbingLStraps"></input-text>
                    straps = {{ formatPrice(webbingLength * webbingLStraps) }} +
                    W
                    <input-text v-model="webbingWidth"></input-text>
                    x
                    <input-text v-model="webbingWStraps"></input-text>
                    straps = {{ formatPrice(webbingWidth * webbingWStraps) }}
                </td>
                <td>{{ formatPrice(webbingLength * webbingLStraps + webbingWidth * webbingWStraps) }}</td>
                <td>x {{ formatPrice(webbingM) }} =</td>
                <td>{{ formatPrice(webbingTotal) }}</td>
            </tr>
            <tr>
                <td>Chafe strip</td>
                <td>
                    <input-text v-model="chafeStrip"></input-text>
                </td>
                <td>x {{ formatPrice(chafeStripM) }} =</td>
                <td>{{ formatPrice(chafeStripTotal) }}</td>
            </tr>
            <tr>
                <td>Springs short 5”
                    <input-text v-model="springsShort"></input-text>
                    long 8”
                    <input-text v-model="springsLong"></input-text>
                </td>
                <td>{{ formatPrice(getSprings()) }}</td>
                <td>x {{ formatPrice(springsM) }} =</td>
                <td>{{ formatPrice(springsTotal) }}</td>
            </tr>
            <tr>
                <td>Spring covers</td>
                <td>
                    <input-text v-model="springsCovers"></input-text>
                </td>
                <td>x {{ formatPrice(springsCoversM) }} =</td>
                <td>{{ formatPrice(springsCoversTotal) }}</td>
            </tr>
            <tr>
                <td>Stainless Steel buckle</td>
                <td>
                    <input-text v-model="stainlessSteelBuckle"></input-text>
                </td>
                <td>x {{ formatPrice(stainlessSteelBuckleM) }} =</td>
                <td>{{ formatPrice(stainlessSteelBuckleTotal) }}</td>
            </tr>
            <tr>
                <td>Pool cover bag</td>
                <td>
                    <input-text v-model="poolCoverBag"></input-text>
                </td>
                <td>x {{ formatPrice(poolCoverBagM) }} =</td>
                <td>{{ formatPrice(poolCoverBagTotal) }}</td>
            </tr>
            <tr>
                <td>Brass pool anchor for concrete</td>
                <td>
                    <input-text v-model="brassPoolAnchor"></input-text>
                </td>
                <td>x {{ formatPrice(brassPoolAnchorM) }} =</td>
                <td>{{ formatPrice(brassPoolAnchorTotal) }}</td>
            </tr>
            <tr>
                <td>Brass anchor w/flange for wood deck</td>
                <td>
                    <input-text v-model="brassAnchor"></input-text>
                </td>
                <td>x {{ formatPrice(brassAnchorM) }} =</td>
                <td>{{ formatPrice(brassAnchorTotal) }}</td>
            </tr>
            <tr>
                <td>Aluminum lawn pool anchor</td>
                <td>
                    <input-text v-model="aluminumLawnPoolAnchor"></input-text>
                </td>
                <td>x {{ formatPrice(aluminumLawnPoolAnchorM) }} =</td>
                <td>{{ formatPrice(aluminumLawnPoolAnchorTotal) }}</td>
            </tr>
            <tr>
                <td>Aluminum tamping tool</td>
                <td>
                    <input-text v-model="aluminumTampingTool"></input-text>
                </td>
                <td>x {{ formatPrice(aluminumTampingToolM) }} =</td>
                <td>{{ formatPrice(aluminumTampingToolTotal) }}</td>
            </tr>
            <tr>
                <td>Installation rod</td>
                <td>
                    <input-text v-model="installationRod"></input-text>
                </td>
                <td>x {{ formatPrice(installationRodM) }} =</td>
                <td>{{ formatPrice(installationRodTotal) }}</td>
            </tr>
            <tr>
                <td>Rubber straps w/stainless steel o-rings</td>
                <td>
                    <input-text v-model="rubberStraps"></input-text>
                </td>
                <td>x {{ formatPrice(rubberStrapsM) }} =</td>
                <td>{{ formatPrice(rubberStrapsTotal) }}</td>
            </tr>
            <tr>
                <td col-md-2>Reinforcement</td>
                <td>
                    <input-text v-model="reinforcement"></input-text>
                </td>
                <td>x {{ formatPrice(reinforcementM) }} =</td>
                <td class="col-md-1">{{ formatPrice(reinforcementTotal) }}</td>
            </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-6">
                <h3>Estimated Pool cover price</h3>
            </div>
            <div class="col-6 text-end">
                <h3>{{ formatPrice(estimatedPrice) }}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-7">
                <div class="col-2">
                    Notes:
                </div>
                <div class="col-10">
                    <textarea v-model="notes" rows="4" cols="50">{{ notes }}</textarea>
                </div>
            </div>
            <div class="col-5">
                <div class="row">
                    <div class="col-6">
                        CT Sales Tax 6.35%
                    </div>
                    <div class="col-6 text-end">
                        {{ formatPrice(tax) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        Shipping & Handling:
                    </div>
                    <div class="col-6 text-end">
                        TBD
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        Total
                    </div>
                    <div class="col-6 text-end">
                        {{ formatPrice(total) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                Please use your carrier of choice to calculate the shipping to our facility in New Haven, CT
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button @click.prevent="submit()" type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <div v-if="showModal">
            <transition name="modal">
                <div class="modal-mask">
                    <div class="modal-wrapper">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Form submitting</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" @click="showModal = false">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Success</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" @click="showModal = false">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>
        </div>
    </div>
</template>
<script>
    import InputText from "@/components/InputText";

    export default {
        components: {
            InputText,
        },
        props: {
            plotId: Number,
        },
        data: function () {
            return {
                fabricWidth: '',
                fabricLength: '',
                fabricM: '1.45',
                webbingLength: '',
                webbingLStraps: '',
                webbingWidth: '',
                webbingWStraps: '',
                webbingM: '0.75',
                chafeStrip: '',
                chafeStripM: '4.00',
                springsShort: '',
                springsLong: '',
                springsM: '7.25',
                springsCovers: '',
                springsCoversM: '3.25',
                stainlessSteelBuckle: '',
                stainlessSteelBuckleM: '1.25',
                poolCoverBag: '',
                poolCoverBagM: '85.00',
                brassPoolAnchor: '',
                brassPoolAnchorM: '5.50',
                brassAnchor: '',
                brassAnchorM: '5.50',
                aluminumLawnPoolAnchor: '',
                aluminumLawnPoolAnchorM: '7.00',
                aluminumTampingTool: '',
                aluminumTampingToolM: '6.50',
                installationRod: '',
                installationRodM: '28.00',
                rubberStraps: '',
                rubberStrapsM: '3.50',
                reinforcement: '',
                reinforcementM: '75',
                fabricColor: '',
                notes: '',
                showModal: false
            }
        },

        computed: {
            fabricTotal() {
                return this.fabricWidth * this.fabricLength * this.fabricM;
            },
            webbingTotal() {
                return (this.webbingLength * this.webbingLStraps + this.webbingWidth * this.webbingWStraps) * this.webbingM;
            },
            chafeStripTotal() {
                return this.chafeStrip * this.chafeStripM;
            },
            springsTotal() {
                return this.getSprings() * this.springsM;
            },
            springsCoversTotal() {
                return this.springsCovers * this.springsCoversM;
            },
            stainlessSteelBuckleTotal() {
                return this.stainlessSteelBuckle * this.stainlessSteelBuckleM;
            },
            poolCoverBagTotal() {
                return this.poolCoverBag * this.poolCoverBagM;
            },
            brassPoolAnchorTotal() {
                return this.brassPoolAnchor * this.brassPoolAnchorM;
            },
            brassAnchorTotal() {
                return this.brassAnchor * this.brassAnchorM;
            },
            aluminumLawnPoolAnchorTotal() {
                return this.aluminumLawnPoolAnchor * this.aluminumLawnPoolAnchorM;
            },
            aluminumTampingToolTotal() {
                return this.aluminumTampingTool * this.aluminumTampingToolM;
            },
            installationRodTotal() {
                return this.installationRod * this.installationRodM;
            },
            rubberStrapsTotal() {
                return this.rubberStraps * this.rubberStrapsM;
            },
            reinforcementTotal() {
                return this.reinforcement * this.reinforcementM;
            },
            estimatedPrice() {
                return this.fabricTotal
                    + this.webbingTotal
                    + this.chafeStripTotal
                    + this.springsTotal
                    + this.springsCoversTotal
                    + this.stainlessSteelBuckleTotal
                    + this.poolCoverBagTotal
                    + this.brassPoolAnchorTotal
                    + this.brassAnchorTotal
                    + this.aluminumLawnPoolAnchorTotal
                    + this.aluminumTampingToolTotal
                    + this.installationRodTotal
                    + this.rubberStrapsTotal
                    + this.reinforcementTotal;
            },
            tax() {
                return 0.0635 * this.estimatedPrice
            },
            total() {
                return this.tax + this.estimatedPrice
            }
        },
        mounted() {

        },
        methods: {
            getSprings() {
                if (this.springsShort != 0 || this.springsShort != '') {
                    return this.springsShort;
                } else {
                    return this.springsLong;
                }
            },

            formatPrice(value) {
                let val = (value / 1).toFixed(2).replace('.', ',');
                return '$' + val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            },

            submit() {
                axios.post('/s/forms/custom-swimming-pool', {
                    'fabricWidth' :	this.fabricWidth,
                    'fabricLength' :	this.fabricLength,
                    'fabricM' :	this.fabricM,
                    'webbingLength' :	this.webbingLength,
                    'webbingLStraps' :	this.webbingLStraps,
                    'webbingWidth' :	this.webbingWidth,
                    'webbingWStraps' :	this.webbingWStraps,
                    'webbingM' :	this.webbingM,
                    'chafeStrip' :	this.chafeStrip,
                    'chafeStripM' :	this.chafeStripM,
                    'springsShort' :	this.springsShort,
                    'springsLong' :	this.springsLong,
                    'springsM' :	this.springsM,
                    'springsCovers' :	this.springsCovers,
                    'springsCoversM' :	this.springsCoversM,
                    'springs' :	this.getSprings(),
                    'stainlessSteelBuckle' :	this.stainlessSteelBuckle,
                    'stainlessSteelBuckleM' :	this.stainlessSteelBuckleM,
                    'poolCoverBag' :	this.poolCoverBag,
                    'poolCoverBagM' :	this.poolCoverBagM,
                    'brassPoolAnchor' :	this.brassPoolAnchor,
                    'brassPoolAnchorM' :	this.brassPoolAnchorM,
                    'brassAnchor' :	this.brassAnchor,
                    'brassAnchorM' :	this.brassAnchorM,
                    'aluminumLawnPoolAnchor' :	this.aluminumLawnPoolAnchor,
                    'aluminumLawnPoolAnchorM' :	this.aluminumLawnPoolAnchorM,
                    'aluminumTampingTool' :	this.aluminumTampingTool,
                    'aluminumTampingToolM' :	this.aluminumTampingToolM,
                    'installationRod' :	this.installationRod,
                    'installationRodM' :	this.installationRodM,
                    'rubberStraps' :	this.rubberStraps,
                    'rubberStrapsM' :	this.rubberStrapsM,
                    'reinforcement' :	this.reinforcement,
                    'reinforcementM' :	this.reinforcementM,
                    'notes' :	this.notes,
                    'fabricTotal':	this.fabricTotal,
                    'webbingTotal':	this.webbingTotal,
                    'chafeStripTotal':	this.chafeStripTotal,
                    'springsTotal':	this.springsTotal,
                    'springsCoversTotal':	this.springsCoversTotal,
                    'stainlessSteelBuckleTotal':	this.stainlessSteelBuckleTotal,
                    'poolCoverBagTotal':	this.poolCoverBagTotal,
                    'brassPoolAnchorTotal':	this.brassPoolAnchorTotal,
                    'brassAnchorTotal':	this.brassAnchorTotal,
                    'aluminumLawnPoolAnchorTotal':	this.aluminumLawnPoolAnchorTotal,
                    'aluminumTampingToolTotal':	this.aluminumTampingToolTotal,
                    'installationRodTotal':	this.installationRodTotal,
                    'rubberStrapsTotal':	this.rubberStrapsTotal,
                    'reinforcementTotal':	this.reinforcementTotal,
                    'estimatedPrice':	this.estimatedPrice,
                    'tax':	this.tax,
                    'total':	this.total,
                })
                    .then((response) => {
                        this.showModal = true;
                        this.clearData();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            clearData() {
                this.fabricWidth = '';
                this.fabricLength = '';
                this.webbingLength = '';
                this.webbingLStraps = '';
                this.webbingWidth = '';
                this.webbingWStraps = '';
                this.chafeStrip = '';
                this.springsShort = '';
                this.springsLong = '';
                this.springsCovers = '';
                this.stainlessSteelBuckle = '';
                this.poolCoverBag = '';
                this.brassPoolAnchor = '';
                this.brassAnchor = '';
                this.aluminumLawnPoolAnchor = '';
                this.aluminumTampingTool = '';
                this.installationRod = '';
                this.rubberStraps = '';
                this.reinforcement = '';
                this.fabricColor = '';
                this.notes = '';
            },
        },
    }
</script>