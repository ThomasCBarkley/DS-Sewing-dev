@extends('layouts.app')

@section('content')
    <div class="swimming-pool-container container mt-0 w-50">
        <div class="row">
            <div class="col-4">
                <h2> New Pool Cover </h2>
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
                    @format($fabricWidth) x @format($fabricLength)
                    width =
                </td>
                <td>@format($fabricWidth *  $fabricLength)</td>
                <td>x @format($fabricM) =</td>
                <td>@format($fabricTotal)</td>
            </tr>
            <tr>
                <td>Webbing L
                    @format($webbingLength)
                    x
                    @format($webbingLStraps)
                    straps = @format($webbingLength * $webbingLStraps) +
                    W
                    @format($webbingWidth)
                    x
                    @format($webbingWStraps)
                    straps = @format($webbingWidth * $webbingWStraps)
                </td>
                <td>@format($webbingLength * $webbingLStraps + $webbingWidth * $webbingWStraps)</td>
                <td>x @format($webbingM) =</td>
                <td>@format($webbingTotal)</td>
            </tr>
            <tr>
                <td>Chafe strip</td>
                <td>
                    @format($chafeStrip)
                </td>
                <td>x @format($chafeStripM) =</td>
                <td>@format($chafeStripTotal)</td>
            </tr>
            <tr>
                <td>Springs short 5”
                    @format($springsShort)
                    long 8”
                    @format($springsLong)
                </td>
                <td>@format($springs) </td>
                <td>x @format($springsM) =</td>
                <td>@format($springsTotal)</td>
            </tr>
            <tr>
                <td>Spring covers</td>
                <td>
                    @format($springsCovers)
                </td>
                <td>x @format($springsCoversM) =</td>
                <td>@format($springsCoversTotal)</td>
            </tr>
            <tr>
                <td>Stainless Steel buckle</td>
                <td>
                    @format($stainlessSteelBuckle)
                </td>
                <td>x @format($stainlessSteelBuckleM) =</td>
                <td>@format($stainlessSteelBuckleTotal)</td>
            </tr>
            <tr>
                <td>Pool cover bag</td>
                <td>
                    @format($poolCoverBag)
                </td>
                <td>x @format($poolCoverBagM) =</td>
                <td>@format($poolCoverBagTotal)</td>
            </tr>
            <tr>
                <td>Brass pool anchor for concrete</td>
                <td>
                    @format($brassPoolAnchor)
                </td>
                <td>x @format($brassPoolAnchorM) =</td>
                <td>@format($brassPoolAnchorTotal)</td>
            </tr>
            <tr>
                <td>Brass anchor w/flange for wood deck</td>
                <td>
                    @format($brassAnchor)
                </td>
                <td>x @format($brassAnchorM) =</td>
                <td>@format($brassAnchorTotal)</td>
            </tr>
            <tr>
                <td>Aluminum lawn pool anchor</td>
                <td>
                    @format($aluminumLawnPoolAnchor)
                </td>
                <td>x @format($aluminumLawnPoolAnchorM) =</td>
                <td>@format($aluminumLawnPoolAnchorTotal)</td>
            </tr>
            <tr>
                <td>Aluminum tamping tool</td>
                <td>
                    @format($aluminumTampingTool)
                </td>
                <td>x @format($aluminumTampingToolM) =</td>
                <td>@format($aluminumTampingToolTotal)</td>
            </tr>
            <tr>
                <td>Installation rod</td>
                <td>
                    @format($installationRod)
                </td>
                <td>x @format($installationRodM) =</td>
                <td>@format($installationRodTotal)</td>
            </tr>
            <tr>
                <td>Rubber straps w/stainless steel o-rings</td>
                <td>
                    @format($rubberStraps)
                </td>
                <td>x @format($rubberStrapsM) =</td>
                <td>@format($rubberStrapsTotal)</td>
            </tr>
            <tr>
                <td col-md-2>Reinforcement</td>
                <td>
                    @format($reinforcement)
                </td>
                <td>x @format($reinforcementM) =</td>
                <td class="col-md-1">@format($reinforcementTotal)</td>
            </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-6">
                <h3>Estimated Pool cover price</h3>
            </div>
            <div class="col-6 text-end">
                <h3>@format($estimatedPrice)</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-7">
                <div class="col-2">
                    Notes:
                </div>
                <div class="col-10">
                    {{ $notes }}
                </div>
            </div>
            <div class="col-5">
                <div class="row">
                    <div class="col-6">
                        CT Sales Tax 6.35%
                    </div>
                    <div class="col-6 text-end">
                        @format($tax)
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
                        @format($total)
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                Please use your carrier of choice to calculate the shipping to our facility in New Haven, CT
            </div>
        </div>
    </div>
@endsection