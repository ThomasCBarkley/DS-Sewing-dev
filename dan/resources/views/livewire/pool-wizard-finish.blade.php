<div>
    <p></p>
        <table align="center"><tbody><tr><td>
                    <table width="588" border="0" cellspacing="0" cellpadding="0" bgcolor="white">
                        <tbody><tr align="left" valign="top" height="41">
                            <td align="left" valign="top" width="530" height="41">
                                <div align="center">
                                    <b><font size="+3" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Completing Your
                                            Order</font></b></div>
                            </td>
                        </tr>
                        <tr align="left" valign="top" height="12">
                            <td align="left" valign="top" width="530" height="12"><font size="3" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Now
                                    that you have been through the measurement process for your custom pool cover,
                                    select from the accessories below to assemble everything you will need for a
                                    smooth installation. </font>
                                <p><font size="3" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">To review cover
                                        installation features and construction, use the following links. <b><i>Always use the
                                                Back button of your browser to return to this page.</i></b></font></p>
                                <table width="534" border="0" cellspacing="0" cellpadding="0">
                                    <tbody><tr height="40">
                                        <td valign="top" height="40">
                                            <div align="right">
                                                <font size="3" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular"><a href="/pool/pooltarp/installation.asp">Cover
                                                        Installation Features</a></font></div>
                                        </td>
                                        <td align="middle" valign="top" width="30" height="40">
                                            <div align="center">
                                            </div>
                                        </td>
                                        <td align="middle" valign="top" height="40">
                                            <div align="left">
                                                <font size="3" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular"><a href="/pool/pooltarp/construction.asp">Pool
                                                        Cover Construction</a></font></div>
                                        </td>
                                    </tr>
                                    </tbody></table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table width="534" border="1" cellspacing="0" cellpadding="6" bgcolor="white">
                                    <tbody><tr>
                                        <td width="160">
                                            <img src="{{$coverImage}}" width="160" height="120" alt="Pool Cover" border="0" vspace="0" hspace="0">
                                        </td>
                                        <td width="280">
                                            <span id="lblDimension">{{$lblDimension}}</span>
                                            Custom Pool Cover
                                        </td>
                                        <td>
                                            <span id="lblPrice" style="color:Red;">{{$coverPrice}}</span>
                                        </td>
                                        <td>
                                            <input name="COVER"  wire:model="COVER" type="text" value="1" maxlength="3" size="3" id="COVER">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" width="160"><!--webbing image here-->&nbsp;</td>
                                        <td valign="top" width="280"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Qty of webbing needed, in feet, for this cover.</font></td>
                                        <td align="middle">{{$pricePLA005}}</td>
                                        <td>
                                            <input name="WEBBING" wire:model="WEBBING" type="text" maxlength="4" size="3" id="WEBBING">
                                        </td>
                                    </tr>
                                    </tbody></table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <b><font size="3" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Hardware For Anchoring - <i>Recommend <span style="color:Red;font-weight:bold;">{{$lblThreeFeets}}</span> Pieces</i></font></b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="left" valign="top" width="530" height="610">
                                <table width="534" border="1" cellspacing="0" cellpadding="6" bgcolor="white">
                                    <tbody><tr>
                                        <td width="160">Item</td>
                                        <td width="280">Description</td>
                                        <td>Price</td>
                                        <td>Quantity</td>
                                    </tr>
                                    <tr>
                                        <td valign="top" width="160"><img src="/images/pool_wizard/concrete-brass-anchor.jpg" alt="" height="47" width="160" border="0"></td>
                                        <td valign="top" width="280"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Brass screw anchor for concrete</font></td>
                                        <td align="right">${{$pricePLA001}}</td>
                                        <td align="middle"><input name="BAC" wire:model="BAC" type="text" value="0" maxlength="3" size="3" id="BAC"></td>
                                    </tr>
                                    <tr>
                                        <td width="160"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular"><img src="/images/pool_wizard/brass-wood-deck-anchor.jpg" alt="" height="58" width="160" border="0"></font></td>
                                        <td valign="top" width="280"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Brass
                                                anchor with flange for wood deck </font>
                                        </td>
                                        <td align="right">${{$pricePLA002}}</td>
                                        <td align="middle"><input name="BAWD" wire:model="BAWD"  type="text" value="0" maxlength="3" size="3" id="BAWD"></td>
                                    </tr>
                                    <tr>
                                        <td width="160"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular"><img src="/images/pool_wizard/spring-brass-anchor.jpg" alt="" height="56" width="160" border="0"></font></td>
                                        <td valign="top" width="280"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Brass Spring
                                                or pop-up anchor for concrete</font></td>
                                        <td align="right">${{$pricePLA003}}</td>
                                        <td align="middle"><input name="SPUA" wire:model="SPUA"  type="text" value="0" maxlength="3" size="3" id="SPUA"></td>
                                    </tr>
                                    <tr>
                                        <td width="160"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular"><img src="/images/pool_wizard/lawn-stake.jpg" alt="" height="52" width="160" border="0"></font></td>
                                        <td valign="top" width="280"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Lawn
                                                stake</font></td>
                                        <td align="right">${{$pricePLA004}}</td>
                                        <td align="middle"><input name="LS" wire:model="LS" type="text" value="0" maxlength="3" size="3" id="LS"></td>
                                    </tr>
                                    </tbody></table>
                                <p>
                                    <font size="3" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular"><b>Hardware For Buckling to Anchors - <i>Recommend <span style="color:Red;font-weight:bold;">{{$lblThreeFeets}}</span> Pieces</i>
                                        </b></font>
                                </p>
                                <table width="534" border="1" cellspacing="0" cellpadding="6" bgcolor="white">
                                    <tbody><tr>
                                        <td width="160">Item</td>
                                        <td width="280">Description</td>
                                        <td>Price</td>
                                        <td>Quantity</td>
                                    </tr>
                                    <tr>
                                        <td width="160"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular"><img src="/images/pool_wizard/stainless-steel-springs.jpg" alt="" height="58" width="160" border="0"></font></td>
                                        <td valign="top" width="280"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">8" Long Stainless
                                                steel spring</font></td>
                                        <td align="right">${{$pricePLS001}}</td>
                                        <td align="middle"><input name="SPRING" wire:model="SPRING" type="text" value="0" maxlength="3" size="3" id="SPRING"></td>
                                    </tr>
                                    <tr>
                                        <td width="160"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular"><img src="/images/pool_wizard/stainless-steel-springs-sma.jpg" alt="" height="58" width="160" border="0"></font></td>
                                        <td valign="top" width="280"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">5" Short Stainless
                                                steel spring</font></td>
                                        <td align="right">${{$pricePLS002}}</td>
                                        <td align="middle"><input name="SSPRING" wire:model="SSPRING" type="text" value="0" maxlength="3" size="3" id="SSPRING"></td>
                                    </tr>
                                    <tr>
                                        <td width="160"><img src="/images/pool_wizard/spring-cover.jpg" alt="" width="160" height="72" border="0"></td>
                                        <td valign="top" width="280"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Cover
                                                for spring</font></td>
                                        <td align="right">${{$pricePLS003}}</td>
                                        <td align="middle"><input name="SPRCOVER" wire:model="SPRCOVER" type="text" value="0" maxlength="3" size="3" id="SPRCOVER"></td>
                                    </tr>
                                    <tr>
                                        <td width="160"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular"><img src="/images/pool_wizard/extension-strap-with-buckle.jpg" alt="" height="74" width="160" border="0"></font></td>
                                        <td valign="top" width="280"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Stainless Steel buckle</font></td>
                                        <td align="right">${{$pricePLCA002}}</td>
                                        <td align="middle"><input name="STRAP" wire:model="STRAP" type="text" value="0" maxlength="3" size="3" id="STRAP"></td>
                                    </tr>
                                    <tr>
                                        <td width="160"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular"><img src="/images/pool_wizard/rubber-extension-strap.jpg" alt="" height="57" width="160" border="0"></font></td>
                                        <td valign="top" width="280"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Reinforcement
                                                chafe strip for pool cover. This material, when applied under straps, will
                                                provide extra protection from wear-and-tear.</font></td>
                                        <td align="right">${{$pricePLCA005}}</td>
                                        <td align="middle"><input name="REINSTRIP" wire:model="REINSTRIP" type="text" value="0" maxlength="3" size="3" id="REINSTRIP"></td>
                                    </tr>
                                    </tbody></table>
                                <p><font size="3" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular"><b>Installation Tools - <i>Recommend <font color="red">1</font> Piece.</i></b></font></p>
                                <table width="534" border="1" cellspacing="0" cellpadding="6" bgcolor="white">
                                    <tbody><tr>
                                        <td width="160">Item</td>
                                        <td width="280">Description</td>
                                        <td>Price</td>
                                        <td>Quantity</td>
                                    </tr>
                                    <tr>
                                        <td width="160"><img src="/images/pool_wizard/aluminum-tamping-tool.jpg" alt="" height="58" width="160" border="0"></td>
                                        <td valign="top" width="280"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Aluminum
                                                tamping tool</font></td>
                                        <td align="right">${{$pricePLCA003}}</td>
                                        <td align="middle"><input name="TAMP" wire:model="TAMP" type="text" value="0" maxlength="3" size="3" id="TAMP"></td>
                                    </tr>
                                    <tr>
                                        <td width="160"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular"><img src="/images/pool_wizard/installation-rod.jpg" alt="" height="35" width="160" border="0"></font></td>
                                        <td valign="top" width="280"><font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">Installation
                                                rod</font></td>
                                        <td align="right">${{$pricePLCA004}}</td>
                                        <td align="middle"><input name="LEVER" wire:model="LEVER" type="text" value="0" maxlength="3" size="3" id="LEVER"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" align="middle">
                                            <input type="submit" name="btnBuy" value="Purchase Selected Items" id="btnBuy" wire:click="submit">
                                        </td>
                                    </tr>
                                    </tbody></table>
                                <table width="529" border="0" cellspacing="0" cellpadding="0">
                                    <tbody><tr>
                                        <td valign="center" height="105"><font size="3" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular">After
                                                entering the quantities of all the accessories you need, click the following
                                                button to proceed with your order. <b><i>Note: If you do not select any accessories, we
                                                        will make your pool cover with grommets instead of preparing it for a selection
                                                        of the above accessories.</i></b></font></td>
                                    </tr>
                                    </tbody></table>
                            </td>
                        </tr>
                        </tbody></table></td>
            </tr>
            </tbody></table>
        <input type="hidden" name="asdasd" value="2E9FE13B">
</div>
