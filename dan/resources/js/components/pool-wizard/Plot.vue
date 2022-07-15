<template>
    <div>
        <table align="center" v-show="firstStep === true">
            <tr>
                <td>
                    <span>{{ name }}</span>&nbsp;|&nbsp;<span>{{ phone }}</span>&nbsp;|&nbsp;<span>{{ email }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <table border="0" bgcolor="#ffcc66" style="BORDER-RIGHT:black 1px solid; BORDER-TOP:black 1px solid; BORDER-LEFT:black 1px solid; BORDER-BOTTOM:black 1px solid" width="100%">
                        <tr>
                            <td>
                                The distance between you A-B reference measurement is {{ referencedistance }}. Round to quarter inches.
                            </td>
                        </tr>
                        <tr>
                            <td>Your plot ID: <b><font color="red">{{ this.plotId }}</font></b> - remember this number to continue where you left off.</td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#cccccc" align="middle"><b>Please Enter A-B measurements.</b></td>
                        </tr>
                        <tr>
                            <td colspan="2" valign="top">
                                <table id="tblPoints">
                                    <tr>
                                        <td align="center" valign="top"><b>X</b></td>
                                        <td align="center" colspan="2" valign="top"><b>A</b></td>
                                        <td align="center" colspan="2" valign="top"><b>B</b></td>
                                        <td align="center" colspan="2" valign="top"><b></b></td>
                                    </tr>
                                    <tr v-for="(item, index) in plotABDistance">
                                        <td valign="top">
                                            {{ item.plotindex }}
                                        </td>
                                        <td valign="top">
                                            <input type="text" maxlength="5" size="3" name="PAF" v-model="item.adistFeet"/> feet
                                        </td>
                                        <td valign="top">
                                            <input type="text" maxlength="5" size="5" name="PAI" v-model="item.adistInch" /> inches
                                        </td>
                                        <td valign="top">
                                            <input type="text" maxlength="5" size="3" name="PBF" v-model="item.bdistFeet" /> feet
                                        </td>
                                        <td valign="top">
                                            <input type="text" maxlength="5" size="5" name="PBI" v-model="item.bdistInch" /> inches
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#cccccc" align="middle"><b>Please enter diagonal and crosscheck reference points.</b></td>
                        </tr>
                        <tr>
                            <td colspan="2" valign="top">
                                <table id="tblCross">
                                    <tr>
                                        <td align="center" valign="top"><b>X Start Point</b></td>
                                        <td align="center" valign="top"><b>X End Point</b></td>
                                        <td colspan="2" align="center" valign="top"><b>Distance</b></td>
                                    </tr>
                                    <tr v-for="(item, index) in plotCrossDistance">
                                        <td valign="top">
                                            <input type="text" name="CPF" v-model="item.fromindex" />
                                        </td>
                                        <td valign="top">
                                            <input type="text" name="CPT" v-model="item.toindex" />
                                        </td>
                                        <td valign="top">
                                            <input type="text" name="CPSF" v-model="item.crossdistanceFeet" /> feet
                                        </td>
                                        <td valign="top">
                                            <input type="text" name="CPSI" v-model="item.crossdistanceInch" /> inches
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#cccccc" align="middle"><b>Please enter perimeter reference points.</b></td>
                        </tr>
                        <tr>
                            <td colspan="2" valign="top">
                                <table id="tblPerim">
                                    <tr>
                                        <td align="center" valign="top"><b>X Start Point</b></td>
                                        <td align="center" valign="top"><b>X End Point</b></td>
                                        <td colspan="2" align="center" valign="top"><b>Distance</b></td>
                                    </tr>
                                    <tr v-for="(item, index) in plotPerimDistance">
                                        <td valign="top">
                                            <input type="text" name="PPF" v-model="item.fromindex" />
                                        </td>
                                        <td valign="top">
                                            <input type="text" name="PPT" v-model="item.toindex"/>
                                        </td>
                                        <td valign="top">
                                            <input type="text" name="PPSF" v-model="item.crossdistanceFeet" /> inches
                                        </td>
                                        <td valign="top">
                                            <input type="text" name="PPSI" v-model="item.crossdistanceInch" /> inches
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" valign="top">
                                <input type="submit" @click.prevent="savePlot()" value="Save Changes" />
                            </td>
                            <td align="right" valign="top">
                                <input type="submit" @click.prevent="showCover()" value="Show Me My Cover" />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table align="center" v-show="firstStep === false">
            <tr>
                <td>
                    <table border="0" bgcolor="#eeeeee"
                           style="BORDER-RIGHT:black 1px solid; BORDER-TOP:black 1px solid; BORDER-LEFT:black 1px solid; BORDER-BOTTOM:black 1px solid">
                        <tr>
                            <td>Your plot id: <b><font color="red">{{ this.plotId }}</font></b> - remember this number to continue where
                                you left off.
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img :src="coverImage">
                            </td>
                        </tr>
                        <tr>
                            <td align="right" colspan="2" valign="top">
                                <input type="button" @click.prevent="changeStep()" value="A/B Measurements"/>&nbsp;&nbsp;<input
                                    type="button" @click.prevent="finish()" value="Pricing"/>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</template>
<script>
export default {
    props: {
        plotId: Number,
    },
    data: function () {
        return {
            firstStep: true,
            name: '',
            phone: '',
            email: '',
            referencedistance: '',
            plotABDistance: [],
            plotCrossDistance: [],
            plotPerimDistance: [],
            coverImage: '',
        }
    },

    mounted() {
        this.loadData();
    },
    methods: {
        loadData: function () {
            axios.get('/dan/pool/plot/data')
                .then((response) => {
                    this.name = response.data.name;
                    this.phone = response.data.phone;
                    this.email = response.data.email;
                    this.referencedistance = response.data.referencedistance;
                    this.plotABDistance = response.data.plotABDistance;
                    this.plotCrossDistance = response.data.crossPoints;
                    this.plotPerimDistance = response.data.perimPoints;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        savePlot: function () {
            axios.post('/dan/pool/plot/data', {
                'plotABDistance': this.plotABDistance,
                'plotCrossDistance': this.plotCrossDistance,
                'plotPerimDistance': this.plotPerimDistance})
                .then((response) => {
                    console.log('Success');
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        showCover: function () {
            axios.get('/dan/pool/plot/data-get-cover')
                .then((response) => {
                    this.coverImage = response.data.image;
                    this.firstStep = false;
                    console.log('Success');
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        changeStep: function () {
            this.firstStep = true;
        },

        finish: function () {
            window.location.href = '/dan/pool/finish';
        }
    },
}
</script>