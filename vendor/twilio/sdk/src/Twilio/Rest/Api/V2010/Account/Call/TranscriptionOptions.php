<?php
/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Api
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Twilio\Rest\Api\V2010\Account\Call;

use Twilio\Options;
use Twilio\Values;

abstract class TranscriptionOptions
{
    /**
     * @param string $name The user-specified name of this Transcription, if one was given when the Transcription was created. This may be used to stop the Transcription.
     * @param string $track
     * @param string $statusCallbackUrl Absolute URL of the status callback.
     * @param string $statusCallbackMethod The http method for the status_callback (one of GET, POST).
     * @param string $inboundTrackLabel Friendly name given to the Inbound Track
     * @param string $outboundTrackLabel Friendly name given to the Outbound Track
     * @param bool $partialResults Indicates if partial results are going to be sent to the customer
     * @param string $languageCode Language code used by the transcription engine, specified in [BCP-47](https://www.rfc-editor.org/rfc/bcp/bcp47.txt) format
     * @param string $transcriptionEngine Definition of the transcription engine to be used, among those supported by Twilio
     * @param bool $profanityFilter indicates if the server will attempt to filter out profanities, replacing all but the initial character in each filtered word with asterisks
     * @param string $speechModel Recognition model used by the transcription engine, among those supported by the provider
     * @param string $hints A Phrase contains words and phrase \\\"hints\\\" so that the speech recognition engine is more likely to recognize them.
     * @param bool $enableAutomaticPunctuation The provider will add punctuation to recognition result
     * @param string $intelligenceService The SID of the [Voice Intelligence Service](https://www.twilio.com/docs/voice/intelligence/api/service-resource) for persisting transcripts and running post-call Language Operators .
     * @return CreateTranscriptionOptions Options builder
     */
    public static function create(
        
        string $name = Values::NONE,
        string $track = Values::NONE,
        string $statusCallbackUrl = Values::NONE,
        string $statusCallbackMethod = Values::NONE,
        string $inboundTrackLabel = Values::NONE,
        string $outboundTrackLabel = Values::NONE,
        bool $partialResults = Values::BOOL_NONE,
        string $languageCode = Values::NONE,
        string $transcriptionEngine = Values::NONE,
        bool $profanityFilter = Values::BOOL_NONE,
        string $speechModel = Values::NONE,
        string $hints = Values::NONE,
        bool $enableAutomaticPunctuation = Values::BOOL_NONE,
        string $intelligenceService = Values::NONE

    ): CreateTranscriptionOptions
    {
        return new CreateTranscriptionOptions(
            $name,
            $track,
            $statusCallbackUrl,
            $statusCallbackMethod,
            $inboundTrackLabel,
            $outboundTrackLabel,
            $partialResults,
            $languageCode,
            $transcriptionEngine,
            $profanityFilter,
            $speechModel,
            $hints,
            $enableAutomaticPunctuation,
            $intelligenceService
        );
    }


}

class CreateTranscriptionOptions extends Options
    {
    /**
     * @param string $name The user-specified name of this Transcription, if one was given when the Transcription was created. This may be used to stop the Transcription.
     * @param string $track
     * @param string $statusCallbackUrl Absolute URL of the status callback.
     * @param string $statusCallbackMethod The http method for the status_callback (one of GET, POST).
     * @param string $inboundTrackLabel Friendly name given to the Inbound Track
     * @param string $outboundTrackLabel Friendly name given to the Outbound Track
     * @param bool $partialResults Indicates if partial results are going to be sent to the customer
     * @param string $languageCode Language code used by the transcription engine, specified in [BCP-47](https://www.rfc-editor.org/rfc/bcp/bcp47.txt) format
     * @param string $transcriptionEngine Definition of the transcription engine to be used, among those supported by Twilio
     * @param bool $profanityFilter indicates if the server will attempt to filter out profanities, replacing all but the initial character in each filtered word with asterisks
     * @param string $speechModel Recognition model used by the transcription engine, among those supported by the provider
     * @param string $hints A Phrase contains words and phrase \\\"hints\\\" so that the speech recognition engine is more likely to recognize them.
     * @param bool $enableAutomaticPunctuation The provider will add punctuation to recognition result
     * @param string $intelligenceService The SID of the [Voice Intelligence Service](https://www.twilio.com/docs/voice/intelligence/api/service-resource) for persisting transcripts and running post-call Language Operators .
     */
    public function __construct(
        
        string $name = Values::NONE,
        string $track = Values::NONE,
        string $statusCallbackUrl = Values::NONE,
        string $statusCallbackMethod = Values::NONE,
        string $inboundTrackLabel = Values::NONE,
        string $outboundTrackLabel = Values::NONE,
        bool $partialResults = Values::BOOL_NONE,
        string $languageCode = Values::NONE,
        string $transcriptionEngine = Values::NONE,
        bool $profanityFilter = Values::BOOL_NONE,
        string $speechModel = Values::NONE,
        string $hints = Values::NONE,
        bool $enableAutomaticPunctuation = Values::BOOL_NONE,
        string $intelligenceService = Values::NONE

    ) {
        $this->options['name'] = $name;
        $this->options['track'] = $track;
        $this->options['statusCallbackUrl'] = $statusCallbackUrl;
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        $this->options['inboundTrackLabel'] = $inboundTrackLabel;
        $this->options['outboundTrackLabel'] = $outboundTrackLabel;
        $this->options['partialResults'] = $partialResults;
        $this->options['languageCode'] = $languageCode;
        $this->options['transcriptionEngine'] = $transcriptionEngine;
        $this->options['profanityFilter'] = $profanityFilter;
        $this->options['speechModel'] = $speechModel;
        $this->options['hints'] = $hints;
        $this->options['enableAutomaticPunctuation'] = $enableAutomaticPunctuation;
        $this->options['intelligenceService'] = $intelligenceService;
    }

    /**
     * The user-specified name of this Transcription, if one was given when the Transcription was created. This may be used to stop the Transcription.
     *
     * @param string $name The user-specified name of this Transcription, if one was given when the Transcription was created. This may be used to stop the Transcription.
     * @return $this Fluent Builder
     */
    public function setName(string $name): self
    {
        $this->options['name'] = $name;
        return $this;
    }

    /**
     * @param string $track
     * @return $this Fluent Builder
     */
    public function setTrack(string $track): self
    {
        $this->options['track'] = $track;
        return $this;
    }

    /**
     * Absolute URL of the status callback.
     *
     * @param string $statusCallbackUrl Absolute URL of the status callback.
     * @return $this Fluent Builder
     */
    public function setStatusCallbackUrl(string $statusCallbackUrl): self
    {
        $this->options['statusCallbackUrl'] = $statusCallbackUrl;
        return $this;
    }

    /**
     * The http method for the status_callback (one of GET, POST).
     *
     * @param string $statusCallbackMethod The http method for the status_callback (one of GET, POST).
     * @return $this Fluent Builder
     */
    public function setStatusCallbackMethod(string $statusCallbackMethod): self
    {
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        return $this;
    }

    /**
     * Friendly name given to the Inbound Track
     *
     * @param string $inboundTrackLabel Friendly name given to the Inbound Track
     * @return $this Fluent Builder
     */
    public function setInboundTrackLabel(string $inboundTrackLabel): self
    {
        $this->options['inboundTrackLabel'] = $inboundTrackLabel;
        return $this;
    }

    /**
     * Friendly name given to the Outbound Track
     *
     * @param string $outboundTrackLabel Friendly name given to the Outbound Track
     * @return $this Fluent Builder
     */
    public function setOutboundTrackLabel(string $outboundTrackLabel): self
    {
        $this->options['outboundTrackLabel'] = $outboundTrackLabel;
        return $this;
    }

    /**
     * Indicates if partial results are going to be sent to the customer
     *
     * @param bool $partialResults Indicates if partial results are going to be sent to the customer
     * @return $this Fluent Builder
     */
    public function setPartialResults(bool $partialResults): self
    {
        $this->options['partialResults'] = $partialResults;
        return $this;
    }

    /**
     * Language code used by the transcription engine, specified in [BCP-47](https://www.rfc-editor.org/rfc/bcp/bcp47.txt) format
     *
     * @param string $languageCode Language code used by the transcription engine, specified in [BCP-47](https://www.rfc-editor.org/rfc/bcp/bcp47.txt) format
     * @return $this Fluent Builder
     */
    public function setLanguageCode(string $languageCode): self
    {
        $this->options['languageCode'] = $languageCode;
        return $this;
    }

    /**
     * Definition of the transcription engine to be used, among those supported by Twilio
     *
     * @param string $transcriptionEngine Definition of the transcription engine to be used, among those supported by Twilio
     * @return $this Fluent Builder
     */
    public function setTranscriptionEngine(string $transcriptionEngine): self
    {
        $this->options['transcriptionEngine'] = $transcriptionEngine;
        return $this;
    }

    /**
     * indicates if the server will attempt to filter out profanities, replacing all but the initial character in each filtered word with asterisks
     *
     * @param bool $profanityFilter indicates if the server will attempt to filter out profanities, replacing all but the initial character in each filtered word with asterisks
     * @return $this Fluent Builder
     */
    public function setProfanityFilter(bool $profanityFilter): self
    {
        $this->options['profanityFilter'] = $profanityFilter;
        return $this;
    }

    /**
     * Recognition model used by the transcription engine, among those supported by the provider
     *
     * @param string $speechModel Recognition model used by the transcription engine, among those supported by the provider
     * @return $this Fluent Builder
     */
    public function setSpeechModel(string $speechModel): self
    {
        $this->options['speechModel'] = $speechModel;
        return $this;
    }

    /**
     * A Phrase contains words and phrase \\\"hints\\\" so that the speech recognition engine is more likely to recognize them.
     *
     * @param string $hints A Phrase contains words and phrase \\\"hints\\\" so that the speech recognition engine is more likely to recognize them.
     * @return $this Fluent Builder
     */
    public function setHints(string $hints): self
    {
        $this->options['hints'] = $hints;
        return $this;
    }

    /**
     * The provider will add punctuation to recognition result
     *
     * @param bool $enableAutomaticPunctuation The provider will add punctuation to recognition result
     * @return $this Fluent Builder
     */
    public function setEnableAutomaticPunctuation(bool $enableAutomaticPunctuation): self
    {
        $this->options['enableAutomaticPunctuation'] = $enableAutomaticPunctuation;
        return $this;
    }

    /**
     * The SID of the [Voice Intelligence Service](https://www.twilio.com/docs/voice/intelligence/api/service-resource) for persisting transcripts and running post-call Language Operators .
     *
     * @param string $intelligenceService The SID of the [Voice Intelligence Service](https://www.twilio.com/docs/voice/intelligence/api/service-resource) for persisting transcripts and running post-call Language Operators .
     * @return $this Fluent Builder
     */
    public function setIntelligenceService(string $intelligenceService): self
    {
        $this->options['intelligenceService'] = $intelligenceService;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Api.V2010.CreateTranscriptionOptions ' . $options . ']';
    }
}


