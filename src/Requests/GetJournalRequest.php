<?php

namespace NicklasW\PkmGoApi\Requests;

use Google\Protobuf\Internal\Message;
use POGOProtos\Networking\Envelopes\ResponseEnvelope;
use POGOProtos\Networking\Requests\RequestType;
use POGOProtos\Networking\Responses\SfidaActionLogResponse;

class GetJournalRequest extends Request {

    /**
     * @var integer The request type
     */
    protected $type = RequestType::SFIDA_ACTION_LOG;

    /**
     * @var Message The request message
     */
    protected $message;

    /**
     * @return int
     */
    public function getType()
    {
        return RequestType::SFIDA_ACTION_LOG;;
    }

    /**
     * @return Message
     */
    public function getMessage()
    {
        return new SfidaActionLogResponse();
    }

    /**
     * Handles the request data.
     *
     * @param ResponseEnvelope $data
     * @return mixed
     */
    public function handleResponse($data)
    {
        // Retrieve the specific request data
        $requestData = $data->getReturns();

        // Initialize the sfida action log response
        $sfidaActionResponse = new SfidaActionLogResponse();

        // Unmarshall the response
        $sfidaActionResponse->decode($requestData[0]);

        $this->setData($sfidaActionResponse);
    }
}